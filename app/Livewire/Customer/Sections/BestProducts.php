<?php

namespace App\Livewire\Customer\Sections;

use App\Models\product;
use GuzzleHttp\Client;
use Livewire\Component;

class BestProducts extends Component
{
    public function render()
    {
        $bestProducts = product::latest()->take(3)->get();
        return view('livewire.customer.sections.best-products', compact('bestProducts'));
    }
}
