<?php

namespace App\Livewire\Admin\Discounts;

use App\Models\Discount;
use App\Models\product;
use GuzzleHttp\Client;
use Livewire\Component;

class DiscountList extends Component
{
    public function render()
    {
        $client = new Client();
        $url = config('services.api_url') . '/product/discounts';
        $response = $client->request('GET', $url);
        $datadiscounts = json_decode($response->getBody()->getContents(), true);
        $discounts = $datadiscounts['data'];

        $url = config('services.api_url') . '/products';
        $responseProducts = $client->request('GET', $url);
        $dataproducts = json_decode($responseProducts->getBody()->getContents(), true);
        $products = $dataproducts['data'];

        return view('livewire.admin.discounts.discount-list', ['discounts' => $discounts, 'products' => $products]);
    }
}
