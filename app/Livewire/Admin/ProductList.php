<?php

namespace App\Livewire\Admin;

use App\Models\product;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        $data = [
            'products' => product::all()->sortDesc()
        ];
        return view('livewire.admin.product-list', $data);
    }
}
