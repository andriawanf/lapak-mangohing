<?php

namespace App\Livewire\Customer\Sections;

use App\Models\product;
use GuzzleHttp\Client;
use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        $client = new Client();
        $url = config('services.api_url') . '/products';
        $response = $client->get($url);
        $productsArray = json_decode($response->getBody()->getContents(), true);
        $products = collect($productsArray['data'])->sortByDesc('id')->take(8)->values();
        return view('livewire.customer.sections.products', ['products' => $products]);
    }
}
