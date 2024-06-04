<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        return view('livewire.admin.product-list');
    }
}
