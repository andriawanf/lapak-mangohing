<?php

namespace App\Livewire\Admin\Products;

use App\Models\product;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EditProduct extends Component
{
    public $product_images = '';

    public function edit($id)
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL') . '/' . $id);
        $dataproducts = json_decode($response->getBody()->getContents(), true);
        $products = $dataproducts['data'];
        return view('livewire.admin.products.edit-product', ['products' => $products]);
    }

    public function render()
    {
        return view('livewire.admin.products.edit-product');
    }
}
