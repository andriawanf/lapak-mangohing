<?php

namespace App\Livewire\Admin\Products;

use App\Models\product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EditProduct extends Component
{
    public $product_images = '';

    public function edit($id)
    {
        $products = product::findOrFail($id);
        $product_images = $this->product_images;
        return view('livewire.admin.products.edit-product', compact('products', 'product_images'));
    }

    public function render()
    {
        return view('livewire.admin.products.edit-product');
    }
}
