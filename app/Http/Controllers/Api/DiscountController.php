<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\DiscountCollection;
use App\Http\Resources\Resources\DiscountResource;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    public function index()
    {
        try {
            $discounts = Discount::with('product')->orderBy('created_at', 'desc')->paginate(10);
            return new DiscountCollection($discounts);
        } catch (\Exception $e) {
            return response()->json(['errpr' => false, 'message' => 'An error occurred while retrieving discounts: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'discount_percentage' => 'required|numeric|min:0',
            'minimum_order' => 'required|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 422);
        }

        try {
            $discount = Discount::create([
                'product_id' => $request->product_id,
                'discount_percentage' => $request->discount_percentage,
                'minimum_order' => $request->minimum_order,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            return new DiscountResource(200, 'Discount created successfully', $discount);
        } catch (\Exception $e) {
            return response()->json(['Failed' => false, 'message' => 'An error occurred while adding the discount: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $discount = Discount::findOrFail($id);
            return new DiscountResource(200, 'Discount retrieved successfully', $discount);
        } catch (\Exception $e) {
            return response()->json(['Failed' => false, 'message' => 'An error occurred while retrieving the discount: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'discount_percentage' => 'required|numeric|min:0',
            'minimum_order' => 'required|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 422);
        }

        try {
            $discount = Discount::findOrFail($id);
            $discount->update([
                'product_id' => $request->product_id,
                'discount_percentage' => $request->discount_percentage,
                'minimum_order' => $request->minimum_order,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            return new DiscountResource(200, 'Discount updated successfully', $discount);
        } catch (\Exception $e) {
            return response()->json(['Failed' => false, 'message' => 'An error occurred while updating the discount: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $discount = Discount::findOrFail($id);
            $discount->delete();
            return new DiscountResource(200, 'Discount deleted successfully', $discount);
        } catch (\Exception $e) {
            return response()->json(['Failed' => false, 'message' => 'An error occurred while deleting the discount: ' . $e->getMessage()], 500);
        }
    }
}
