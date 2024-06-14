<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DiscountController extends Controller
{
    public function store(Request $request)
    {
        // validation
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount_percentage' => 'required|numeric|min:0',
            'minimum_order' => 'required|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Discount::create($validatedData);
        return redirect()->route('dashboard.admin.products.discount')->with('success', 'Discount created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validation
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount_percentage' => 'required|numeric|min:0',
            'minimum_order' => 'required|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $discount = Discount::where('discount_id', $id)->firstOrFail();
        $discount->update($validatedData);
        return redirect()->route('dashboard.admin.products.discount')->with('success', 'Discount updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Discount::where('discount_id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
