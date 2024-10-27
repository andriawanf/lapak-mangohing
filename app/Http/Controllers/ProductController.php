<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Products::with('images')->get();
        return view('dashboard.products.index', compact('products'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|integer',
            'product_stock' => 'required|integer',
            'product_category' => 'required',
            'product_tag' => 'required',
            'product_weight' => 'required|integer',
            'product_length' => 'required|integer',
            'product_breadth' => 'required|integer',
            'product_width' => 'required|integer',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024', // Validasi gambar
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        try {
            $product = new Products();
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_price = $request->product_price;
            $product->product_stock = $request->product_stock;
            $product->product_category = $request->product_category;
            $product->product_tag = $request->product_tag;
            $product->product_weight = $request->product_weight;
            $product->product_length = $request->product_length;
            $product->product_breadth = $request->product_breadth;
            $product->product_width = $request->product_width;
            $product->save();

            if ($request->hasFile('product_images')) {
                $files = $request->file('product_images');
                foreach ($files as $file) {
                    $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('public/images/products', $imageName);

                    $image = new Image();
                    $image->url = $imageName;
                    $image->product_id = $product->id;
                    $image->save();
                }
            }

            return redirect()->route('dashboard.products.index')->with('success', 'Product added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.products.index')->with('error', 'Failed to add product.');
        }
    }

    // Menampilkan detail produk
    public function show($id)
    {
        $product = Products::with('images')->findOrFail($id);
        return view('dashboard.products.show', compact('product'));
    }

    // Memperbarui produk
    public function update(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'required',
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

        try {
            $product = Products::findOrFail($id);
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_price = $request->product_price;
            $product->product_stock = $request->product_stock;
            $product->product_category = $request->product_category;
            $product->product_tag = $request->product_tag;
            $product->product_weight = $request->product_weight;
            $product->product_length = $request->product_length;
            $product->product_breadth = $request->product_breadth;
            $product->product_width = $request->product_width;
            $product->save();

            if ($product) {
                foreach ($product->images as $image) {
                    Storage::delete('public/images/products/' . $image->url);
                    $image->delete();
                }
            }

            if ($request->hasFile('product_images')) {
                $files = $request->file('product_images');
                foreach ($files as $file) {
                    $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('public/images/products', $imageName);

                    $image = new Image();
                    $image->url = $imageName;
                    $image->product_id = $product->id;
                    $image->save();
                }
            }

            return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.products.index')->with('error', 'Failed to update product.');
        }
    }

    // Menghapus produk
    public function destroy($id)
    {
        try {
            $product = Products::findOrFail($id);
            foreach ($product->images as $image) {
                Storage::delete('public/images/products/' . $image->url);
                $image->delete();
            }
            $product->delete();

            return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.products.index')->with('error', 'Failed to delete product.');
        }
    }

    // Fitur pencarian produk
    public function search(Request $request)
    {
        $query = $request->input('query');
        $sortBy = $request->input('sort_by', 'product_name');
        $minPrice = $request->input('min_price', []);

        $products = Products::with('images')
            ->where('product_name', 'LIKE', "%{$query}%")
            ->orWhere('product_number', 'LIKE', "%{$query}%")
            ->orWhere('product_tag', 'LIKE', "%{$query}%")
            ->orWhere('product_price', 'LIKE', "%{$query}%")
            ->when($minPrice, function ($q) use ($minPrice) {
                if (!empty($minPrice)) {
                    $q->whereIn('product_price',  $minPrice);
                }
            })
            ->orderBy($sortBy, 'asc')
            ->get();

        return view('dashboard.products.search', compact('products'));
    }
}
