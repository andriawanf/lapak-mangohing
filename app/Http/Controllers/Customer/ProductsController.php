<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = config('services.api_url') . '/products';
        $response = $client->request('GET', $url);
        $dataproducts = json_decode($response->getBody()->getContents(), true);
        $products = collect($dataproducts['data'])->sortByDesc('id')->forPage(1, 12)->values();

        return view('customer.product.index', ['products' => $products]);
    }
}
