<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
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
            'product_images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('product_images');
        $image->storeAs('/images', $image->hashName());

        product::create([
            'product_name' => $request->product_name,
            'product_number' => $request->product_number,
            'product_category' => $request->product_category,
            'product_price' => $request->product_price,
            'product_stock' => $request->product_stock,
            'product_description' => $request->product_description,
            'discount_percentage' => $request->discount_percentage,
            'minimum_order_amount' => $request->minim_orders,
            'discount_period_start' => $request->discount_period_start,
            'discount_period_end' => $request->discount_period_end,
            'product_tag' => $request->product_tag,
            'product_weight' => $request->product_weight,
            'product_length' => $request->product_length,
            'product_breadth' => $request->product_breadth,
            'product_width' => $request->product_width,
            'product_images' => $image->hashName(),
        ]);
        return redirect()->back()->with('success', 'Product created successfully');
    }
}
