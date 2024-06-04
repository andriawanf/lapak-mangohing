<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\OrderList;
use App\Livewire\Admin\ProductList;
use App\Livewire\Admin\Products\AddProduct;
use App\Livewire\Admin\UserList;
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
    Route::group(['prefix' => '/dashboard-admin/products'], function () {
        Route::get('/list', ProductList::class)->name('dashboard.admin.products.list');
        Route::get('/add-product', AddProduct::class)->name('dashboard.admin.products.add');
        Route::post('/add-product', [ProductList::class, 'store'])->name('dashboard.admin.products.store');
        Route::get('/edit-product/{id}', [ProductList::class, 'edit'])->name('dashboard.admin.products.edit');
        Route::patch('/edit-product/{id}', [ProductList::class, 'update'])->name('dashboard.admin.products.update');
        Route::delete('/delete-product/{id}', [ProductList::class, 'destroy'])->name('dashboard.admin.products.destroy');
    });
    Route::get('/dashboard-admin/orders', OrderList::class)->name('dashboard.admin.orders');
    Route::get('/dashboard-admin/categories', ProductList::class)->name('dashboard.admin.categories');
    Route::get('/dashboard-admin/reviews', ProductList::class)->name('dashboard.admin.reviews');
    Route::get('/dashboard-admin/users', UserList::class)->name('dashboard.admin.users');
    Route::get('/dashboard-admin/users/{user}/edit', UserList::class)->name('dashboard.admin.users.edit');
    Route::delete('/dashboard-admin/users/{user}', UserList::class)->name('dashboard.admin.users.destroy');
    Route::get('/dashboard-admin/profile', ProductList::class)->name('dashboard.admin.profile');
});

require __DIR__ . '/auth.php';
