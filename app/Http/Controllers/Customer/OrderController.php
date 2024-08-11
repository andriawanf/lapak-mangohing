<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Payment;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    public function orderSummary($orderId)
    {
        if (Auth::check()) {
            $order = Order::findOrFail($orderId);
            $whatsappMessage = $this->generateWhatsAppMessage($order);
            $payment = $this->generateSnapToken($order);
            return view('customer.product.order-summary', compact('order', 'whatsappMessage', 'payment'));
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
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

    private function generateSnapToken($order)
    {
        $payment = new Payment;
        $payment->order_id = $order->id;
        $payment->user_id = $order->user_id;
        $payment->payment_status = 'pending';
        $payment->price = $order->grand_total;
        $payment->product_name = $order->items[0]->product_name;
        $payment->customer_name = $order->customer_name;
        $payment->customer_email = $order->customer_email;

        // configure payment gateway
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat payload untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->grand_total,
            ],
            'item_details' => $order->items->map(function ($item) {
                return [
                    'id' => $item->product_id,
                    'price' => $item->base_price,
                    'quantity' => $item->quantity,
                    'name' => $item->product_name,
                ];
            })->toArray(),
            'customer_details' => [
                'first_name' => $order->customer_name,
                'email' => $order->customer_email,
                'phone' => $order->customer_phone,
            ],
            'enabled_payments' => ['gopay', 'credit_card', 'bca_va', 'bri_va', 'bni_va', 'dana'],
        ];

        $snapToken = Snap::getSnapToken($params);
        $payment->payment_link = $snapToken;
        $payment->save();
        return $snapToken;
    }

    public function sendWhatsapp(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'message' => 'required',
            'whatsapp_number' => 'required',
        ]);

        $order = Order::findOrFail($request->order_id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        try {
            $adminPhoneNumber = config('services.admin_phone_number');
            $userPhoneNumber = $request->whatsapp_number;
            $message = $request->message;

            $whatsappLink = "https://wa.me/$adminPhoneNumber?text=" . urlencode("$message");

            return redirect($whatsappLink);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to send message');
        }
    }

    public function orderConfirmation($order)
    {
        if (Auth::check()) {
            $payment = Payment::where('order_id', $order)->first();
            $orders = Order::where('id', $payment->order_id)->first();
            return view('customer.product.order-confirmation', compact('payment', 'orders'));
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }

    // order success
    public function orderSuccess($order)
    {
        if (Auth::check()) {
            $payment = Payment::where('order_id', $order)->first();
            $orders = Order::where('id', $payment->order_id)->first();
            $user = Auth::user();
            if ($payment) {
                // delete all cart
                $cart = Cart::where('user_id', $user->id)->delete();
                // delete all cart items
                CartItem::where('cart_id', $cart)->delete();
                // delete all order items
                // $orderItems = OrderItems::where('order_id', $orders->id)->delete();
                // delete all orders 
                // $orders->delete();
            }
            return view('customer.product.order-success', compact('payment', 'orders'));
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
    }
}
