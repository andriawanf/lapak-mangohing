<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    // Menampilkan daftar produk dengan pagination
    public function index(Request $request)
    {
        // Ambil parameter halaman dari request atau default ke halaman 1
        $page = $request->input('page', 1);
        $perPage = 12; // Jumlah item per halaman

        // Ambil semua produk dari database, dan urutkan yang ada diskon terlebih dahulu
        $productsData = Product::with('discounts') // Pastikan relasi diskon sudah ada
            ->get()
            ->sortBy(function ($product) {
                return $product->discounts ? 0 : 1; // Prioritaskan produk yang memiliki diskon
            });

        $total = $productsData->count(); // Total produk dari database

        // Buat instance LengthAwarePaginator untuk pagination
        $products = new LengthAwarePaginator(
            $productsData->forPage($page, $perPage)->values(),
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('customer.product.index', ['products' => $products, 'productCount' => $total]);
    }

    // Pencarian produk berdasarkan kata kunci
    public function search(Request $request)
    {
        $query = $request->search;

        if (!empty($query)) {
            // Ambil produk berdasarkan kata kunci pencarian
            $productsData = Product::with('discounts')
                ->where('product_name', 'like', '%' . $query . '%')
                ->orWhere('product_number', 'like', '%' . $query . '%')
                ->orWhere('product_stock', 'like', '%' . $query . '%')
                ->orWhere('product_tag', 'like', '%' . $query . '%')
                ->orWhere('product_price', 'like', '%' . $query . '%')
                ->orderByDesc('id')
                ->paginate(12);

            $productCount = $productsData->total();

            return view('customer.product.index', ['products' => $productsData, 'productCount' => $productCount]);
        } else {
            // Jika pencarian kosong, kembalikan semua produk seperti fungsi index
            return $this->index($request);
        }
    }

    // Menambahkan produk ke keranjang belanja
    public function addCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $user = Auth::user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id], ['total_price' => 0]);

        // Menambahkan atau memperbarui item keranjang
        $cartItem = $cart->cartItems()->where('product_id', $product->id)->first();

        if ($product->product_stock < $request->quantity) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi');
        } else {
            // Cek diskon yang berlaku
            $discount = $product->discounts()
                ->where('start_date', '<=', now())
                ->where('end_date', '>=', now())
                ->where('status', true)
                ->first();

            $discountedPrice = $discount ? $product->product_price * (1 - $discount->discount_percentage / 100) : $product->product_price;

            if ($cartItem) {
                // Update item di keranjang
                $cartItem->quantity += $request->quantity;
                $cartItem->price = $discountedPrice;
                $cartItem->save();
            } else {
                // Tambahkan item baru ke keranjang
                $cart->cartItems()->create([
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                    'price' => $discountedPrice,
                ]);
            }

            // Menghitung ulang total harga keranjang
            $totalHarga = $cart->cartItems->sum(function ($item) {
                return $item->quantity * $item->price;
            });

            $cart->update(['total_price' => $totalHarga]);

            return redirect()->back()->with(['success' => 'Produk ditambahkan ke keranjang', 'cart' => $cart]);
        }
    }

    // Memperbarui jumlah produk di keranjang belanja
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

    // Menghapus item dari keranjang
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

    // Menampilkan halaman keranjang belanja pengguna
    public function myCart()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $dataCart = Cart::where('user_id', $user->id)->with('cartItems', 'cartItems.product')->first();
            $cartCount = $dataCart ? $dataCart->cartItems->count() : 0;

            return view('customer.product.shopping-cart', ['dataCart' => $dataCart, 'cartCount' => $cartCount]);
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }

    // Menghitung detail total pesanan dari keranjang
    public function calculateCartDetailOrder(Request $request)
    {
        $productIds = $request->product_ids;
        $user = Auth::user();

        $cartItems = Cart::where('user_id', $user->id)->with('cartItems.product')->first()->cartItems()->whereIn('product_id', $productIds)->get();

        $subtotal = $cartItems->sum(function ($item) {
            $price = $item->product->product_price;
            $discounts = $item->product->discounts()->get();
            if ($discounts->isNotEmpty()) {
                $totalDiscount = $discounts->sum('discount_percentage');
                $price = $price * (1 - ($totalDiscount / 100));
            }
            return $item->quantity * $price;
        });

        $totalDiscountInRupiah = $cartItems->sum(function ($item) {
            $price = $item->product->product_price;
            $discountedPrice = $item->price;
            return $price - $discountedPrice;
        });

        return response()->json([
            'subtotal' => $subtotal,
            'total_discount' => $totalDiscountInRupiah,
            'grand_total' => $subtotal - $totalDiscountInRupiah
        ]);
    }
}
