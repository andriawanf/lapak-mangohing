<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        $url = config('services.api_url') . '/products';

        // Ambil parameter halaman dari request atau default ke halaman 1
        $page = $request->input('page', 1);
        $perPage = 12; // Jumlah item per halaman

        // Tambahkan parameter pagination ke URL
        $response = $client->request('GET', $url, [
            'query' => [
                'page' => $page,
                'per_page' => $perPage,
            ]
        ]);

        $dataproducts = json_decode($response->getBody()->getContents(), true);
        $productsData = collect($dataproducts['data'])->sortBy(function ($product) {
            return $product['discounts'] ? 0 : 1;
        });

        $total = count($dataproducts['data']); // Total produk dari API

        // Buat instance LengthAwarePaginator
        $products = new LengthAwarePaginator(
            $productsData->forPage($page, $perPage)->values(),
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('customer.product.index', ['products' => $products, 'productCount' => $total]);
    }

    public function search(Request $request)
    {
        $client = new Client();
        if ($request->search != '') {
            $url = config('services.api_url') . '/product/search?query=' . $request->search;
            $response = $client->request('GET', $url);
            $dataproducts = json_decode($response->getBody()->getContents(), true);
            $products = collect($dataproducts['data'])->sortByDesc('id')->forPage(1, 12)->values();
            $productCount = collect($dataproducts['data'])->count();
            return view('customer.product.index', ['products' => $products, 'productCount' => $productCount]);
        } else {
            $url = config('services.api_url') . '/products';
            $response = $client->request('GET', $url);
            $dataproducts = json_decode($response->getBody()->getContents(), true);
            $products = collect($dataproducts['data'])->sortByDesc('id')->forPage(1, 12)->values();
            $productCount = collect($dataproducts['data'])->count();
            return view('customer.product.index', ['products' => $products, 'productCount' => $productCount]);
        }
    }

    public function addCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        $product_id = product::findOrFail($request->product_id);
        $user = Auth::user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id], ['total_price' => 0]);

        // Menambahkan atau memperbarui item keranjang
        $cartItem = $cart->cartItems()->where('product_id', $product_id->id)->first();

        // Cek diskon yang berlaku
        $discount = $product_id->discounts()
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('status', true)
            ->first();

        $discount ? $discountedPrice = $product_id->product_price - ($discount->discount_percentage / 100) * $product_id->product_price : $discountedPrice = $product_id->product_price;
        // if ($discount) {
        //     $discountedPrice = $product_id->product_price - (($discount->discount_percentage / 100) * $product_id->product_price);
        // } else {
        //     $discountedPrice = $product_id->product_price;
        // }

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->price = $discountedPrice;
            $cartItem->save();
        } else {
            $cartItem = $cart->cartItems()->create([
                'product_id' => $product_id->id,
                'quantity' => $request->quantity,
                'price' => $discountedPrice,
            ]);
        }

        // Menghitung ulang total harga keranjang
        $totalHarga = $cart->cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $cart->update(['total_price' => $totalHarga]);
        return redirect()->back()->with(['success' => 'Product added to cart', 'cart' => $cart]);
    }

    public function updateCart(Request $request)
    {
        $cartItem = CartItem::findOrFail($request->input('id'));
        $cartItem->update(['quantity' => $request->input('quantity')]);

        // Menghitung ulang total harga keranjang
        $cart = $cartItem->cart;
        $totalHarga = $cart->cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $cart->update(['total_price' => $totalHarga]);

        return response()->json(['message' => 'Cart updated', 'cart' => $cart]);
    }

    public function deleteCart($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        // Menghitung ulang total harga keranjang
        $cart = $cartItem->cart;
        $totalHarga = $cart->cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $cart->update(['total_price' => $totalHarga]);
        return redirect()->back()->with('success', 'Product deleted from cart');
    }

    // my cart
    public function myCart()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $dataCart = Cart::where('user_id', $user->id)->with('cartItems', 'cartItems.product')->first();
            if ($dataCart) {
                $cartCount = $dataCart->cartItems->count();
                return view('customer.product.shopping-cart', ['dataCart' => $dataCart, 'cartCount' => $cartCount]);
            } else {
                $cartCount = 0;
                return view('customer.product.shopping-cart', ['dataCart' => $dataCart, 'cartCount' => $cartCount]);
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }

    public function calculateCartDetailOrder(Request $request)
    {
        $productIds = $request->product_ids;
        $user = Auth::user();

        $cartItems = Cart::where('user_id', $user->id)->with('cartItems', 'cartItems.product')->first()->cartItems()->whereIn('product_id', $productIds)->get();

        $subtotal = $cartItems->sum(function ($item) {
            $product = $item->product;
            $discounts = $product->discounts()->get();
            $price = $product->product_price;

            if ($discounts->isNotEmpty()) {
                $totalDiscount = $discounts->sum('discount_percentage');
                $price = $product->product_price * (1 - ($totalDiscount / 100));
            }

            return $item->quantity * $price;
        });

        return response()->json([
            'subtotal' => $subtotal,
        ]);
    }


    // checkout
    public function checkout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->with('cartItems', 'cartItems.product')->first();

            DB::transaction(function () use ($cart) {
                foreach ($cart->cartItems as $item) {
                    $product = $item->product;
                    if ($product->product_stock < $item->quantity) {
                        throw new \Exception("Product {$product->product_name} out of stock");
                    }
                    $product->decrement('product_stock', $item->quantity);
                }

                $cart->cartItems()->delete();
                $cart->update(['total_price' => 0]);
            });
            return view('customer.product.checkout');
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }

    // order summary
    public function orderSummary()
    {
        if (Auth::check()) {
            return view('customer.product.order-summary');
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }
}
