<?php

namespace App\Livewire\Customer\Components;

use App\Models\Cart;
use App\Models\Discount;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $dataCart = Cart::where('user_id', $user->id)->with('cartItems', 'cartItems.product')->first();
            if ($dataCart) {
                $cartCount = $dataCart->cartItems->count();
                $grand_total = $dataCart->cartItems->reduce(function ($subtotal, $cartItem) {
                    $product = $cartItem->product;
                    $discounts = $product->discounts()->get(); // Ambil semua diskon terkait produk
                    if ($discounts->isNotEmpty()) {
                        $totalDiscount = $discounts->sum('discount_percentage');
                        $discountedPrice = $product->product_price * (1 - ($totalDiscount / 100));
                        return $subtotal + $discountedPrice * $cartItem->quantity;
                    }
                    return $subtotal + $product->product_price * $cartItem->quantity;
                }, 0);

                $discount = $dataCart->cartItems->reduce(function ($discount, $cartItem) {
                    $product = $cartItem->product;
                    $discounts = $product->discounts()->get();
                    if ($discounts->isNotEmpty()) {
                        $totalDiscount = $discounts->sum('discount_percentage');
                        $discount += $totalDiscount;
                    }
                    return $discount;
                }, 0);

                return view('livewire.customer.components.header', compact('cartCount', 'dataCart', 'grand_total', 'discount'));
            } else {
                $cartCount = 0;
                $grand_total = 0;
                $discount = 0;
                return view('livewire.customer.components.header', compact('cartCount', 'dataCart', 'grand_total', 'discount'));
            }
        } else {
            return view('login');
        }
    }
}
