<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/products', ProductController::class);
Route::prefix('product')->group(function () {
    Route::apiResource('/discounts', \App\Http\Controllers\Api\DiscountController::class);
    Route::get('/add-cart/{id}', [ProductController::class, 'addCart']);
    Route::get('/search', [ProductController::class, 'search']);
});

// auth
Route::middleware('guest')->group(function () {
    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/log-in', [AuthenticationController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/log-out', [AuthenticationController::class, 'logout']);
});
