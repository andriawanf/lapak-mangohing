<?php

namespace App\Livewire\Customer\Components;

use App\Models\Cart;
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
            return view('livewire.customer.components.header', compact('cartCount', 'dataCart'));
        } else {
            return view('livewire.customer.components.header');
        }
    }
}
