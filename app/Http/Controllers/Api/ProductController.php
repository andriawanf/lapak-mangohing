<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\ProductCollection;
use App\Http\Resources\Resources\ProductResource;
use App\Models\Image;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $products = Product::with('images', 'discounts')->get();
            return new ProductCollection($products);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while retrieving products: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_number' => 'required',
            'product_category' => 'required',
            'product_price' => 'required|integer',
            'product_stock' => 'required|integer',
            'product_description' => 'required',
            'product_tag' => 'required',
            'product_weight' => 'required|integer',
            'product_length' => 'required|integer',
            'product_breadth' => 'required|integer',
            'product_width' => 'required|integer',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024', // Note the .*
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        try {
            $product = new Product;
            $product->product_name = $request->product_name;
            $product->product_number = $request->product_number;
            $product->product_category = $request->product_category;
            $product->product_price = $request->product_price;
            $product->product_stock = $request->product_stock;
            $product->product_description = $request->product_description;
            $product->product_tag = $request->product_tag;
            $product->product_weight = $request->product_weight;
            $product->product_length = $request->product_length;
            $product->product_breadth = $request->product_breadth;
            $product->product_width = $request->product_width;
            $product->save();

            if ($request->hasFile('product_images')) {
                $files = $request->file('product_images');
                foreach ($files as $file) {
                    $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalName();
                    $path = $file->storeAs('public/images/products/', $imageName);

                    $image = new Image;
                    $image->url = $imageName;
                    $image->product_id = $product->id;
                    $image->save();
                }
            } else {
                $imageName = 'default-product.png';
                $path = 'images/products/' . $imageName;
                $image = new Image;
                $image->url = $imageName;
                $image->product_id = $product->id;
                $image->save();
            }

            return new ProductResource(true, 'Product added successfully', $product);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while adding the product: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $product = Product::with('images')->findOrFail($id);
            return new ProductResource(true, 'Product retrieved successfully', $product);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while retrieving the product: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_number' => 'required',
            'product_category' => 'required',
            'product_price' => 'required|integer',
            'product_stock' => 'required|integer',
            'product_description' => 'required',
            'product_tag' => 'required',
            'product_weight' => 'required|integer',
            'product_length' => 'required|integer',
            'product_breadth' => 'required|integer',
            'product_width' => 'required|integer',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024', // Note the .*
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        try {
            $product = Product::findOrFail($id);
            $product->product_name = $request->product_name;
            $product->product_number = $request->product_number;
            $product->product_category = $request->product_category;
            $product->product_price = $request->product_price;
            $product->product_stock = $request->product_stock;
            $product->product_description = $request->product_description;
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

                    $image = new Image;
                    $image->url = $imageName;
                    $image->product_id = $product->id;
                    $image->save();
                }
            } else {
                $imageName = 'default-product.png';
                $path = 'images/products/' . $imageName;
                $image = new Image;
                $image->url = $imageName;
                $image->product_id = $product->id;
                $image->save();
            }

            return new ProductResource(true, 'Product updated successfully', $product);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while updating the product: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            foreach ($product->images as $image) {
                Storage::delete('public/images/products/' . $image->url);
                $image->delete();
            }

            $product->delete();

            return response()->json(['success' => true, 'message' => 'Product deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting the product: ' . $e->getMessage()], 500);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $sortBy = $request->input('sort_by', 'product_name');
        // $minRating = $request->input('min_rating', []);
        $minPrice = $request->input('min_price', []);

        if (!$query) {
            return response()->json(['error' => 'Query parameter is required'], 400);
        }

        // Lakukan pencarian di sini
        $products = product::with('images', 'discounts')->where(function ($q) use ($query) {
            $q->where('product_name', 'LIKE', "%{$query}%")
                ->orWhere('product_number', 'LIKE', "%{$query}%")
                ->orWhere('product_stock', 'LIKE', "%{$query}%")
                ->orWhere('product_tag', 'LIKE', "%{$query}%")
                ->orWhere('product_price', 'LIKE', "%{$query}%");
        })
            //  ->when($minRating, function ($q, $minRating) {
            //      return $q->where('rating', '>=', $minRating);
            //  })
            ->when($minPrice, function ($q) use ($minPrice) {
                if (!empty($minPrice)) {
                    $q->whereIn('product_price',  $minPrice);
                }
            })
            ->orderBy($sortBy, 'asc')
            ->get();
        return new ProductCollection($products);
    }

    public function addCart($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product) {
            return response()->json(['success' => true, 'message' => 'Product added to cart successfully', 'data' => $product], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }
    }
}
