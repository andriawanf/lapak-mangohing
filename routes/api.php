<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/products', \App\Http\Controllers\Api\ProductController::class);
Route::prefix('product')->group(function () {
    Route::apiResource('/discounts', \App\Http\Controllers\Api\DiscountController::class);
});
