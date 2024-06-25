<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Reviews::all();
        return view('livewire.admin.reviews', ['reviews' => $reviews]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $review = new Reviews();
        $review->user_id = auth()->user()->id;
        $review->product_id = $request->product_id;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->is_approved = false;
        $review->save();

        return redirect()->back()->with('success', 'Review created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reviews $reviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reviews $reviews)
    {
        //
    }
}
