<?php

namespace App\Livewire\Admin;

use App\Models\product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductList extends Component
{
    public function render(Request $request)
    {
        $client = new Client();
        $page = $request->query('page', 1);
        $url = config('services.api_url') . '/products';
        try {
            $response = $client->request('GET', $url, [
                'query' => ['page' => $page],
            ]);

            $data_products = json_decode($response->getBody()->getContents(), true);
            return view('livewire.admin.product-list', ['data_products' => $data_products, 'page' => $page]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch products'], 500);
        }
    }
}
