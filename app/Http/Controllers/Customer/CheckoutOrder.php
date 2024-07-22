<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
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
            $productIds = $request->product_ids;
            $productIds = trim($productIds, '[]');
            $productIdsArray = explode(',', $productIds); // Ubah string menjadi array menggunakan explode

            // Ambil setiap product_id dari array dan simpan dalam array baru
            $productIds = array_map('intval', $productIdsArray);

            // Dapatkan cart items untuk user dan produk yang dipilih
            $cart = Cart::where('user_id', $user->id)->with('cartItems.product')->first();

            if (!$cart) {
                return redirect()->back()->withErrors(['error' => 'No items in the cart.']);
            }

            $cartItems = $cart->cartItems->whereIn('product_id', $productIds)->all();

            if (count($cartItems) == 0) {
                return redirect()->back()->withErrors(['error' => 'Selected products not found in the cart.']);
            }

            // Debugging
            if ($cartItems == null) {
                return redirect()->back()->withErrors(['error' => 'Cart items is null.']);
            }

            if (!is_array($cartItems) && !$cartItems instanceof \Illuminate\Support\Collection) {
                return redirect()->back()->withErrors(['error' => 'Cart items is not an array or collection.']);
            }

            $order = Order::create([
                'order_number' => 'ORDER' . Str::random(7) . rand(100000, 999999),
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
                'shipping_method' => $request->shipping_method,
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
                $product->update(['product_stock' => $product->product_stock - $item->quantity]);

                // Remove cart item
                $item->delete();
            }

            $shippingMethod = $this->shippingMethod($request->shipping_method);
            $shippingCost = $this->calculateShippingCost($request->shipping_method);
            $grandTotal = $baseTotalPrice - $discountAmount + $shippingCost;

            $order->update([
                'base_total_price' => $baseTotalPrice,
                'discount_amount' => $discountAmount,
                'discount_percent' => ($discountAmount / $baseTotalPrice) * 100,
                'shipping_cost' => $shippingCost,
                'shipping_method' => $shippingMethod,
                'grand_total' => $grandTotal,
            ]);

            DB::commit();

            // delete cart
            Cart::where('user_id', $user->id)->delete();

            // generate whatsapp message for send to admin.
            $whatsappMessage = $this->generateWhatsAppMessage($order);

            return redirect()->route('orderSummary', ['order' => $order->id])
                ->with(['success' => 'Order placed successfully!', 'order' => $order, 'whatsappMessage' => $whatsappMessage]);
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

    private function generateWhatsAppMessage($order)
    {
        $message = "Pesanan Baru\n\n";
        $message .= "Order No: {$order->order_number}\n";
        $message .= "Nama Pembeli: {$order->customer_name}\n";
        $message .= "Email: {$order->customer_email}\n";
        $message .= "No. Telepon: {$order->customer_phone}\n";
        $message .= "Alamat Lengkap: {$order->customer_address}, Kec. {$order->customer_district}, Kab. {$order->customer_regency}, Kota {$order->customer_city}, {$order->customer_province}, {$order->customer_country}, Kode Pos {$order->customer_postcode}\n";
        $orderDate = Carbon::parse($order->order_date)->isoFormat('dddd, D MMMM Y');
        $message .= "Tanggal Pemesanan: {$orderDate}\n";
        $message .= "Metode Pengiriman: Pengiriman {$order->shipping_method}\n";
        if ($order->purchase_option == 'mitra_dagang') {
            $message .= "Jenis Pembelian: Mitra Dagang\n";
        } else {
            $message .= "Jenis Pembelian: Bayar Sekarang\n";
        }
        $message .= "Catatan: {$order->customer_note}\n\n";
        $message .= "Produk:\n";
        foreach ($order->items as $item) {
            $basePriceProduct = number_format($item->base_price, 0, ',', '.');
            $subTotalProduct = number_format($item->sub_total, 0, ',', '.');
            $message .= "- {$item->product_name} ({$item->quantity} pcs) (Rp. {$basePriceProduct}) = Rp. {$subTotalProduct}\n";
        }
        $baseTotalPrice = number_format($order->base_total_price, 0, ',', '.');
        $discountAmount = number_format($order->discount_amount, 0, ',', '.');
        $shippingCost = number_format($order->shipping_cost, 0, ',', '.');
        $grandTotal = number_format($order->grand_total, 0, ',', '.');
        $message .= "\n\n";
        $message .= "Rincian Total Harga:\n";
        $message .= "Subtotal: Rp. {$baseTotalPrice}\n";
        $message .= "Diskon : Rp. {$discountAmount}\n";
        $message .= "Biaya Pengiriman: Rp. {$shippingCost}\n";
        $message .= "Total: Rp. {$grandTotal}\n";

        return $message;
    }
}
