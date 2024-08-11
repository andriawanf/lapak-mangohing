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
        // Find the order by ID
        $order = Order::findOrFail($orderId);

        // Configure the payment gateway
        $serverKey = config('midtrans.serverKey');
        if (empty($serverKey)) {
            throw new \Exception('Midtrans server key is not configured.');
        }
        Config::$serverKey = $serverKey;
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Prepare the payload for Midtrans
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
            $auth = base64_encode($serverKey);

            // Initiate the payment
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Basic $auth",
            ])->post(config('midtrans.snapUrl'), $params);

            // Check if the payment initiation was successful
            if ($response->failed()) {
                throw new \Exception('Failed to initiate payment: ' . $response->body());
            }

            // Update the order with the payment link
            $snapToken = $response['token'];
            $order->update(['payment_link' => $snapToken]);

            // Render the order summary view with the payment link and order
            return view('order-summary', compact('snapToken', 'order'));
        } catch (\Exception $e) {
            // If the payment initiation fails, redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'Failed to initiate payment. ' . $e->getMessage()]);
        }
    }

    public function paymentCallback(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $hash = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hash !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $orderId = $request->order_id;
        $paymentStatus = $request->transaction_status;
        $paymentType = $request->payment_type;
        $fraudStatus = $request->fraud_status;
        $grossAmount = $request->gross_amount;
        $paymentLink = $request->payment_link;

        try {
            $order = Order::findOrFail($orderId);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $paymentStatus = $this->getPaymentStatus($paymentStatus, $paymentType, $fraudStatus);

        $order->update(['payment_status' => $paymentStatus]);

        Payment::create([
            'order_id' => $orderId,
            'user_id' => $order->user_id,
            'payment_status' => $paymentStatus,
            'price' => $grossAmount,
            'payment_link' => $paymentLink,
        ]);

        return response()->json(['message' => 'Payment status updated'], 200);
    }

    private function getPaymentStatus($transactionStatus, $paymentType, $fraudStatus)
    {
        if ($transactionStatus == 'capture') {
            if ($paymentType == 'credit_card') {
                return $fraudStatus == 'challenge' ? 'challenge' : 'paid';
            }
        }

        $statusMap = [
            'settlement' => 'paid',
            'pending' => 'pending',
            'deny' => 'denied',
            'expire' => 'expired',
            'cancel' => 'canceled',
        ];

        return $statusMap[$transactionStatus] ?? 'unknown';
    }
}
