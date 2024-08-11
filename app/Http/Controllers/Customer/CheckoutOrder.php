<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItems;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class CheckoutOrder extends Controller
{
    // checkout
    public function checkout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $productIds = $request->input('product_ids', []);
            $cartItems = Cart::where('user_id', $user->id)->with('cartItems', 'cartItems.product')->first()->cartItems()->whereIn('product_id', $productIds)->get();
            // dd($cartItems);

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
            }

            $totalDiscount = ($discountAmount / $baseTotalPrice) * 100;
            $grandTotal = $baseTotalPrice - $discountAmount;

            return view('customer.product.checkout', compact('cartItems', 'discountAmount', 'totalDiscount', 'baseTotalPrice', 'grandTotal'));
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }

    public function checkoutProcess(Request $request)
    {
        $request->validate([
            'purchase_option' => 'required',
            'shipping_method' => 'required',
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
        ]);

        DB::beginTransaction();

        try {
            $user = Auth::user();
            $productIds = array_map('intval', explode(',', trim($request->product_ids, '[]')));

            $cartItems = CartItem::where('cart_id', function ($query) use ($user) {
                $query->select('id')->from('carts')->where('user_id', $user->id);
            })->whereIn('product_id', $productIds)->with('product')->get();

            if ($cartItems->isEmpty()) {
                return redirect()->back()->withErrors(['error' => 'No items in the cart.']);
            }

            $order = $this->createOrder($user, $request, $cartItems);

            $this->createOrderItems($order, $cartItems);

            $this->updateProductStock($cartItems);

            $shippingCost = $this->calculateShippingCost($request->shipping_method);
            $order->update([
                'shipping_cost' => $shippingCost,
                'grand_total' => $order->base_total_price - $order->discount_amount + $shippingCost,
            ]);

            DB::commit();

            return redirect()->route('orderSummary', ['order' => $order->id])
                ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function createOrder($user, $request, $cartItems)
    {
        $order = Order::create([
            'order_number' => 'ORDER-' . Str::random(10) . rand(100000, 999999),
            'user_id' => $user->id,
            'status' => 'pending',
            'order_date' => now(),
            'payment_due' => now()->addDays(1),
            'payment_status' => 'pending',
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
            'shipping_method' => $request->shipping_method,
            'purchase_option' => $request->purchase_option,
        ]);

        $baseTotalPrice = $discountAmount = 0;

        foreach ($cartItems as $item) {
            $baseTotalPrice += $item->product->product_price * $item->quantity;
            $discountAmount += $item->product->discounts->sum('discount_percentage') * $item->product->product_price * $item->quantity / 100;
        }

        $order->update([
            'base_total_price' => $baseTotalPrice,
            'discount_amount' => $discountAmount,
            'discount_percent' => ($discountAmount / $baseTotalPrice) * 100,
        ]);

        return $order;
    }

    private function createOrderItems($order, $cartItems)
    {
        foreach ($cartItems as $item) {
            $discountPercent = $item->product->discounts->sum('discount_percentage');
            $discountAmount = $item->product->product_price * $discountPercent / 100;
            $subTotal = ($item->product->product_price - $discountAmount) * $item->quantity;

            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'base_price' => $item->product->product_price,
                'base_total' => $item->product->product_price * $item->quantity,
                'discount_amount' => $discountAmount,
                'discount_percent' => $discountPercent,
                'sub_total' => $subTotal,
                'product_name' => $item->product->product_name,
            ]);
        }
    }

    private function updateProductStock($cartItems)
    {
        foreach ($cartItems as $item) {
            $item->product->decrement('product_stock', $item->quantity);
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

    private function shippingMethod($shippingMethod)
    {
        switch ($shippingMethod) {
            case 'pengiriman_gratis':
                return 'gratis';
            case 'pengiriman_reguler':
                return 'reguler';
            case 'pengiriman_cepat':
                return 'cepat';
            default:
                return 'gratis';
        }
    }
}
