<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = config('services.api_url') . '/products';
        $response = $client->request('GET', $url);
        $dataproducts = json_decode($response->getBody()->getContents(), true);
        $products = collect($dataproducts['data'])->sortBy(function ($product) {
            return $product['discounts'] ? 0 : 1;
        })->forPage(1, 50)->values();
        $productCount = collect($dataproducts['data'])->count();
        return view('customer.product.index', ['products' => $products, 'productCount' => $productCount]);
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

    public function deleteCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Product deleted from cart');
    }

    // my cart
    public function myCart()
    {
        $user = Auth::user();
        $dataCart = Cart::with('product', 'product.images', 'product.discounts')->where('user_id', $user->id)->get();
        return view('customer.product.shopping-cart', ['dataCart' => $dataCart]);
    }
}
