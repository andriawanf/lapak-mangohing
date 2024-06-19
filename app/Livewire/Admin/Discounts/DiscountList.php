<?php

namespace App\Livewire\Admin\Discounts;

use App\Models\Discount;
use App\Models\product;
use Livewire\Component;

class DiscountList extends Component
{
    public function render()
    {
        $discounts = Discount::all()->sortDesc();
        $products = product::all();
        return view('livewire.admin.discounts.discount-list', compact('discounts', 'products'));
    }
}