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
            ])->post(config('midtrans.snapUrl'), $params);

            $snapToken = Snap::getSnapToken($params);
            $order->update(['payment_link' => $snapToken]);
            return view('order-summary', compact('snapToken', 'order'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to initiate payment.']);
        }
    }

    public function paymentCallback(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            $order = Order::findOrFail($request->order_id);
            $paymentStatus = $request->transaction_status;
            $paymentType = $request->payment_type;
            $fraudStatus = $request->fraud_status;

            if ($paymentStatus == 'capture') {
                if ($paymentType == 'credit_card') {
                    if ($fraudStatus == 'challenge') {
                        // Challenge payment
                        $order->update(['payment_status' => 'challenge']);
                    } else {
                        // Payment success
                        $order->update(['payment_status' => 'paid']);
                    }
                }
            } elseif ($paymentStatus == 'settlement') {
                // Payment success
                $order->update(['payment_status' => 'paid']);
            } elseif ($paymentStatus == 'pending') {
                // Waiting for payment
                $order->update(['payment_status' => 'pending']);
            } elseif ($paymentStatus == 'deny') {
                // Payment denied
                $order->update(['payment_status' => 'denied']);
            } elseif ($paymentStatus == 'expire') {
                // Payment expired
                $order->update(['payment_status' => 'expired']);
            } elseif ($paymentStatus == 'cancel') {
                // Payment canceled
                $order->update(['payment_status' => 'canceled']);
            }

            Payment::create([
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'payment_status' => $paymentStatus,
                'price' => $request->gross_amount,
                'payment_link' => $request->payment_link,
            ]);
        } else {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        return response()->json(['message' => 'Payment status updated'], 200);
    }
}
