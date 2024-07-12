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
        $user = Auth::user();
        if ($user) {
            $dataCart = Cart::where('user_id', $user->id)->with('cartItems', 'cartItems.product')->first();
            if ($dataCart) {
                $cartCount = $dataCart->cartItems->count();
                $grand_total = $dataCart->total_price;

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
            return view('livewire.customer.components.header');
        }
    }
}
