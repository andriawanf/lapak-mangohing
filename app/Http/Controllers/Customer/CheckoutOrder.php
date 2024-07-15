<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutOrder extends Controller
{
    // checkout
    public function checkout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $productIds = $request->input('product_ids', []);
            $cartItems = Cart::where('user_id', $user->id)->with('cartItems', 'cartItems.product')->first()->cartItems()->whereIn('product_id', $productIds)->get();

            // DB::transaction(function () use ($cart) {
            //     foreach ($cart->cartItems as $item) {
            //         $product = $item->product;
            //         if ($product->product_stock < $item->quantity) {
            //             throw new \Exception("Product {$product->product_name} out of stock");
            //         }
            //         $product->decrement('product_stock', $item->quantity);
            //     }

            //     $cart->cartItems()->delete();
            //     $cart->update(['total_price' => 0]);
            // });
            return view('customer.product.checkout', compact('cartItems'));
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }

    public function checkoutProcess(Request $request)
    {
        $request->validate([
            'purchase_option' => 'required',
            'customer_name' => 'required',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required',
            'customer_country' => 'required',
            'customer_province' => 'required',
            'customer_city' => 'required',
            'customer_regency' => 'required',
            'customer_district' => 'required',
            'customer_postcode' => 'required|integer',
            'customer_address' => 'required',
            'customer_note' => 'required',
            'shipping_method' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = Auth::user();
            $productIds = $request->product_ids;
            $productIds = trim($productIds, '[]');
            $productIdsArray = explode(',', $productIds); // Ubah string menjadi array menggunakan explode

            // Ambil setiap product_id dari array dan simpan dalam array baru
            $productIds = array_map('intval', $productIdsArray);

            $cartItems = Cart::where('user_id', $user->id)->with('cartItems', 'cartItems.product')->first()->cartItems()->whereIn('product_id', $productIds)->get();

            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'pending',
                'order_date' => now(),
                'payment_due' => now()->addDays(1),
                'payment_status' => 'pending',
                'base_total_price' => 0,
                'discount_amount' => 0,
                'discount_percent' => 0,
                'shipping_cost' => 0,
                'grand_total' => 0,
                'purchase_option' => $request->purchase_option,
                'customer_note' => $request->customer_note,
                'customer_name' => $request->customer_name,
                'customer_address' => $request->customer_address,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'customer_country' => $request->customer_country,
                'customer_province' => $request->customer_province,
                'customer_city' => $request->customer_city,
                'customer_regency' => $request->customer_regency,
                'customer_district' => $request->customer_district,
                'customer_postcode' => $request->customer_postcode,
            ]);

            $baseTotalPrice = 0;
            $discountAmount = 0;

            foreach ($cartItems as $item) {
                $product = $item->product;
                $discounts = $product->discounts;

                $price = $product->product_price;
                $discountPercent = $discounts->sum('discount_percentage');
                $discountAmountItem = $price * ($discountPercent / 100);
                $subTotal = ($price - $discountAmountItem) * $item->quantity;

                $baseTotalPrice += $price * $item->quantity;
                $discountAmount += $discountAmountItem * $item->quantity;

                OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item->quantity,
                    'base_price' => $price,
                    'base_total' => $price * $item->quantity,
                    'discount_amount' => $discountAmountItem,
                    'discount_percent' => $discountPercent,
                    'sub_total' => $subTotal,
                    'product_name' => $product->product_name,
                ]);

                // Reduce product stock
                $product->update(['stock' => $product->stock - $item->quantity]);
            }

            $shippingCost = $this->calculateShippingCost($request->shipping_method);
            $grandTotal = $baseTotalPrice - $discountAmount + $shippingCost;

            $order->update([
                'base_total_price' => $baseTotalPrice,
                'discount_amount' => $discountAmount,
                'discount_percent' => ($discountAmount / $baseTotalPrice) * 100,
                'shipping_cost' => $shippingCost,
                'grand_total' => $grandTotal,
            ]);

            DB::commit();

            // Optionally, you can send an email confirmation to the user here.

            return redirect()->route('orderSummary', ['order' => $order->id])
                ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function calculateShippingCost($shippingMethod)
    {
        switch ($shippingMethod) {
            case 'pengiriman_gratis':
                return 0;
            case 'pengiriman_reguler':
                return 10000;
            case 'pengiriman_cepat':
                return 20000;
            default:
                return 0;
        }
    }

    // order summary
    public function orderSummary($orderId)
    {
        if (Auth::check()) {
            $order = Order::findOrFail($orderId);
            return view('customer.product.order-summary', compact('order'));
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }
}
