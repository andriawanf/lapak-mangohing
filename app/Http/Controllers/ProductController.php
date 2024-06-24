<?php

namespace App\Http\Controllers;

use App\Models\product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function store(Request $request)
    {

        $client = new Client();
        $url = config('services.api_url') . '/products';
        try {
            $response = $client->post($url, [
                'multipart' => $this->prepareMultipartData($request)
            ]);

            $page = $request->query('page', 1);
            return redirect()->route('dashboard.admin.products.list', ['page' => $page])->with('success', 'Product created successfully');
        } catch (RequestException $e) {
            return redirect()->route('dashboard.admin.products.list' . '?page=1')->with('error', 'Failed to add product. Please try again.');
        }
    }

    private function prepareMultipartData(Request $request)
    {
        $multipart = [];
        $fields = $request->all();

        foreach ($fields as $name => $value) {
            if (is_array($value)) {
                foreach ($value as $file) {
                    $multipart[] = [
                        'name'     => $name . '[]',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName()
                    ];
                }
            } else {
                $multipart[] = [
                    'name'     => $name,
                    'contents' => $value
                ];
            }
        }

        return $multipart;
    }


    public function edit($id)
    {
        $client = new Client();
        $url = config('services.api_url') . '/products' . '/' . $id;
        $response = $client->request('GET', $url);
        $dataproducts = json_decode($response->getBody()->getContents(), true);
        $products = $dataproducts['data'];
        return view('livewire.admin.products.edit-product', ['product' => $products]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_images' => 'required',
            'product_price' => 'required|integer',
            'product_stock' => 'required|integer',
            'product_category' => 'required',
            'product_tag' => 'required',
            'product_weight' => 'required|integer',
            'product_length' => 'required|integer',
            'product_breadth' => 'required|integer',
            'product_width' => 'required|integer',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $client = new Client();
        $url = config('services.api_url') . '/products' . '/' . $id;
        try {
            $response = $client->post($url, [
                'multipart' => $this->prepareMultipartData($request)
            ]);
            return redirect()->route('dashboard.admin.products.list')->with('success', 'Product updated successfully');
        } catch (RequestException $e) {
            return redirect()->route('dashboard.admin.products.list')->with('error', 'Failed to update product. Please try again.');
            //throw $th;
        }
    }


    public function destroy($id)
    {
        $client = new Client();
        $response = $client->delete(config('services.api_url') . '/products' . '/' . $id);

        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
