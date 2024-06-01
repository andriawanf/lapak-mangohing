<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\ProductList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('/dashboard-admin', function () {
        return view('admin/dashboard-admin');
    })->name('dashboard.admin');
    Route::get('/dashboard-admin/products', ProductList::class)->name('dashboard.admin.products');
    Route::get('/dashboard-admin/orders', ProductList::class)->name('dashboard.admin.orders');
    Route::get('/dashboard-admin/categories', ProductList::class)->name('dashboard.admin.categories');
    Route::get('/dashboard-admin/reviews', ProductList::class)->name('dashboard.admin.reviews');
    Route::get('/dashboard-admin/users', ProductList::class)->name('dashboard.admin.users');
    Route::get('/dashboard-admin/profile', ProductList::class)->name('dashboard.admin.profile');
});

require __DIR__ . '/auth.php';
