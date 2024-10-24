<?php

namespace App\Livewire\Admin;

use App\Models\product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductList extends Component
{
    public function render(Request $request)
    {
        // Ambil parameter halaman dari request atau default ke halaman 1
        $page = $request->input('page', 1);
        $perPage = 12; // Jumlah item per halaman

        // Ambil semua produk dari database, dan urutkan yang ada diskon terlebih dahulu
        $productsData = product::with('discounts') // Pastikan relasi diskon sudah ada
            ->get()
            ->sortBy(function ($product) {
                return $product->discounts ? 0 : 1; // Prioritaskan produk yang memiliki diskon
            });

        $total = $productsData->count(); // Total produk dari database

        // Buat instance LengthAwarePaginator untuk pagination
        $data_products = new LengthAwarePaginator(
            $productsData->forPage($page, $perPage)->values(),
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('livewire.admin.product-list', ['data_products' => $productsData, 'page' => $page]);
    }
}
