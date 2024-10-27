<?php

namespace App\Livewire\Customer\Sections;

use App\Models\Products as ModelsProducts;
use GuzzleHttp\Client;
use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        $products = ModelsProducts::orderByDesc('id')->take(8)->get();
        return view('livewire.customer.sections.products', ['products' => $products]);
    }
}
