<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function store(Request $request)
    {
        $request->validate(
            [
                'product_name' => 'required',
                'product_number' => 'required',
                'product_category' => 'required',
                'product_price' => 'required|integer',
                'product_stock' => 'required|integer',
                'product_description' => 'required',
                'product_tag' => 'required',
                'product_weight' => 'required',
                'product_length' => 'required',
                'product_breadth' => 'required',
                'product_width' => 'required',
                'product_images' => 'required|array',
                'product_images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ],
            [
                'product_images.required' => 'Please upload an image',
                'product_images.*.mimes' => 'Only jpeg,png and bmp images are allowed',
                'product_images.*.max' => 'Sorry! Maximum allowed size for an image is 10MB',
            ]
        );

        $images = [];
        foreach ($request->file('product_images') as $image) {
            $imageName = time() . '_' . uniqid() . '_' . $image->hashName();
            $image->storeAs('public/images/products', $imageName);
            $images[] = $imageName;
        }

        product::create([
            'product_name' => $request->product_name,
            'product_number' => $request->product_number,
            'product_category' => $request->product_category,
            'product_price' => $request->product_price,
            'product_stock' => $request->product_stock,
            'product_description' => $request->product_description,
            'discount_percentage' => $request->discount_percentage ?? 0,
            'minimum_order_amount' => $request->minim_orders ?? 0,
            'discount_period_start' => $request->discount_period_start ?? null,
            'discount_period_end' => $request->discount_period_end ?? null,
            'product_tag' => $request->product_tag,
            'product_weight' => $request->product_weight,
            'product_length' => $request->product_length,
            'product_breadth' => $request->product_breadth,
            'product_width' => $request->product_width,
            'product_images' => json_encode($images),
        ]);
        return redirect()->back()->with('success', 'Product created successfully');
    }


    public function edit($id)
    {
        $product = product::findOrFail($id);
        return view('livewire.admin.products.edit-product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'product_name' => 'required',
                'product_number' => 'required',
                'product_category' => 'required',
                'product_price' => 'required|integer',
                'product_stock' => 'required|integer',
                'product_description' => 'required',
                'discount_percentage' => 'required|integer',
                'minim_orders' => 'required|integer',
                'discount_period_start' => 'required|date',
                'discount_period_end' => 'required|date',
                'product_tag' => 'required',
                'product_weight' => 'required',
                'product_length' => 'required',
                'product_breadth' => 'required',
                'product_width' => 'required',
                'product_images' => 'nullable|array',
                'product_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ],
            [
                'product_images.required' => 'Please upload an image',
                'product_images.*.mimes' => 'Only jpeg,png and bmp images are allowed',
                'product_images.*.max' => 'Sorry! Maximum allowed size for an image is 10MB',
            ]
        );

        $product = product::findOrFail($id);
        $product->update([
            'product_name' => $request->product_name,
            'product_number' => $request->product_number,
            'product_category' => $request->product_category,
            'product_price' => $request->product_price,
            'product_stock' => $request->product_stock,
            'product_description' => $request->product_description,
            'discount_percentage' => $request->discount_percentage ?? 0,
            'minimum_order_amount' => $request->minim_orders ?? 0,
            'discount_period_start' => $request->discount_period_start ?? null,
            'discount_period_end' => $request->discount_period_end ?? null,
            'product_tag' => $request->product_tag,
            'product_weight' => $request->product_weight,
            'product_length' => $request->product_length,
            'product_breadth' => $request->product_breadth,
            'product_width' => $request->product_width,
        ]);

        if ($request->hasFile('product_images')) {
            $images = [];
            $product_images = json_decode($product->product_images, true);
            foreach ($product_images as $image) {
                Storage::delete('public/images/products/' . $image);
            }
            foreach ($request->file('product_images') as $image) {
                $imageName = time() . '_' . uniqid() . '_' . $image->hashName();
                $image->storeAs('public/images/products', $imageName);
                $images[] = $imageName;
            }

            $product->update(['product_images' => json_encode($images)]);
        }

        return redirect()->route('dashboard.admin.products.list')->with('success', 'Product updated successfully');
    }


    public function destroy($id)
    {
        $product = product::findOrFail($id);
        Storage::delete('public/images/products/' . $product->product_images);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
