<?php

namespace App\Livewire\Admin\Products;

use App\Models\product;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddProduct extends Component
{
    #[Validate('required')]
    public $product_name = '';
    #[Validate('required')]
    public $product_number = '';
    #[Validate('required')]
    public $product_category = '';
    #[Validate('required')]
    public $product_price = '';
    #[Validate('required')]
    public $product_stock = '';
    #[Validate('required')]
    public $product_description = '';
    #[Validate('required')]
    public $discount_percentage = '';
    #[Validate('required')]
    public $minim_orders = '';
    #[Validate('required')]
    public $discount_period_start = '';
    #[Validate('required')]
    public $discount_period_end = '';
    #[Validate('required')]
    public $product_tag = '';
    #[Validate('required')]
    public $product_weight = '';
    #[Validate('required')]
    public $product_length = '';
    #[Validate('required')]
    public $product_width = '';
    #[Validate('required')]
    public $product_breadth = '';
    public $product_images = 'default.jpg';

    public function store()
    {
        product::create([
            'product_name' => $this->product_name,
            'product_number' => $this->product_number,
            'product_category' => $this->product_category,
            'product_price' => $this->product_price,
            'product_stock' => $this->product_stock,
            'product_description' => $this->product_description,
            'discount_percentage' => $this->discount_percentage,
            'minimum_order_amount' => $this->minim_orders,
            'discount_period_start' => $this->discount_period_start,
            'discount_period_end' => $this->discount_period_end,
            'product_tag' => $this->product_tag,
            'product_weight' => $this->product_weight,
            'product_length' => $this->product_length,
            'product_width' => $this->product_width,
            'product_breadth' => $this->product_breadth,
            'product_images' => 'default.jpg',
        ]);

        return redirect()->route('dashboard.admin.products.list')->with('success', 'Product added successfully');
    }
    public function render()
    {
        return view('livewire.admin.products.add-product');
    }
}
