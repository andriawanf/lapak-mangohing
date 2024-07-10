<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
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

    public function addCart($id)
    {
        if (Auth::check()) {
            $product_id = $id;
            $user = Auth::user();
            $product = product::find($product_id);
            $cartItem = Cart::where('user_id', $user->id)->where('product_id', $product_id)->first();
            if ($cartItem) {
                $qty = $cartItem->quantity += 1;
                $cartItem->subtotal = $product->product_price * $qty;
                $cartItem->update();
            } else {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->product_id = $product_id;
                $cart->quantity = 1;
                $cart->subtotal = $product->product_price;
                $cart->save();
            }
            return redirect()->back()->with('success', 'Product added to cart');
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }

    public function updateCart(Request $request)
    {
        $cartId = $request->input('id');
        $quantity = $request->input('quantity');

        $cart = Cart::find($cartId);
        if ($cart) {
            $cart->quantity = $quantity;
            $cart->subtotal = $cart->product->product_price * $quantity;
            $cart->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function deleteCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Product deleted from cart');
    }

    // my cart
    public function myCart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cartCount = Cart::where('user_id', $user->id)->count();
            $dataCart = Cart::with('product', 'product.images', 'product.discounts')->where('user_id', $user->id)->get();
            return view('customer.product.shopping-cart', ['dataCart' => $dataCart, 'cartCount' => $cartCount]);
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }

    // checkout
    public function checkout()
    {
        if (Auth::check()) {
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
