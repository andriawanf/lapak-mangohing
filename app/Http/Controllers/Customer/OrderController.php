<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderSummary($orderId)
    {
        if (Auth::check()) {
            $order = Order::findOrFail($orderId);
            return view('customer.product.order-summary', compact('order'));
        } else {
            return redirect()->route('login')->with('error', 'Please login first');
        }
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
}
