<?php

namespace App\Livewire\Customer\Sections;

use App\Models\product;
use GuzzleHttp\Client;
use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        $products = product::orderByDesc('id')->take(8)->get();
        return view('livewire.customer.sections.products', ['products' => $products]);
    }
}
