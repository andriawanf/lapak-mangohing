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
            $cartCount = Cart::where('user_id', $user->id)->count();
            $dataCart = Cart::with('product', 'product.images', 'product.discounts')->where('user_id', $user->id)->get();
            $subtotal = $dataCart->reduce(function ($subtotal, $cart) {
                $product = $cart->product;
                $discounts = $product->discounts;
                if ($discounts->isNotEmpty()) {
                    $totalDiscount = $discounts->sum('discount_percentage');
                    $discountedPrice = $product->product_price * (1 - ($totalDiscount / 100) / count($discounts));
                    return $subtotal + $discountedPrice * $cart->quantity;
                }
                return $subtotal + $product->product_price * $cart->quantity;
            }, 0);

            $discount = $dataCart->reduce(function ($discount, $cart) {
                $product = $cart->product;
                $discounts = $product->discounts;
                if ($discounts->isNotEmpty()) {
                    $totalDiscount = $discounts->sum('discount_percentage');
                    $discount += $totalDiscount;
                }
                return $discount;
            }, 0);
            return view('livewire.customer.components.header', compact('cartCount', 'dataCart', 'subtotal', 'discount'));
        } else {
            return view('livewire.customer.components.header');
        }
    }
}
