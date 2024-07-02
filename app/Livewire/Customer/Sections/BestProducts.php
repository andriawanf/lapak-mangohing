<?php

namespace App\Livewire\Customer\Sections;

use App\Models\product;
use GuzzleHttp\Client;
use Livewire\Component;

class BestProducts extends Component
{
    public function render()
    {
        $client = new Client();
        $url = config('services.api_url') . '/products';
        $response = $client->get($url);
        $productsArray = json_decode($response->getBody()->getContents(), true);
        $bestProducts = collect($productsArray['data'])->sortByDesc('id')->take(3)->values();
        return view('livewire.customer.sections.best-products', compact('bestProducts'));
    }
}
