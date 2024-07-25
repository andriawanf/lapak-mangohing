<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function processPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

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
            'item_details' => $order->orderItems->map(function ($item) {
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

        try {
            $auth = base64_encode(config('midtrans.serverKey'));

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Basic $auth",
            ])->post('https://app.sandbox.midtrans.com/snap/v1/transaction', $params);

            $snapToken = Snap::getSnapToken($params);
            $order->update(['payment_link' => $snapToken]);
            return view('order-summary', compact('snapToken', 'order'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to initiate payment.']);
        }
    }

    public function paymentCallback(Request $request)
    {
        // Handle Midtrans payment notification here
        $serverKey = config('midtrans.serverKey');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            $order = Order::find($request->order_id);

            if ($order) {
                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    $order->payment_status = 'paid';
                    $order->status = 'paid';
                } elseif ($request->transaction_status == 'pending') {
                    $order->payment_status = 'pending';
                    $order->status = 'pending';
                } elseif ($request->transaction_status == 'deny' || $request->transaction_status == 'expire' || $request->transaction_status == 'cancel') {
                    $order->payment_status = 'failed';
                    $order->status = 'failed';
                }

                $order->save();
            }
        }

        return response()->json(['message' => 'Payment notification received.']);
    }
}
