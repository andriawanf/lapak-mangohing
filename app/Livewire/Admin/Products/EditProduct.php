<?php

namespace App\Livewire\Admin\Products;

use App\Models\product;
use Livewire\Component;

class EditProduct extends Component
{
    public $product;

    public function edit($id)
    {
        $products = product::findOrFail($id);
        return view('livewire.admin.products.edit-product', compact('products'));
    }

    public function render()
    {
        return view('livewire.admin.products.edit-product');
    }
}
