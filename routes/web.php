<?php

use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Discounts\DiscountList;
use App\Livewire\Admin\OrderList;
use App\Livewire\Admin\ProductList;
use App\Livewire\Admin\Products\AddProduct;
use App\Livewire\Admin\Products\EditProduct;
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
        Route::post('/add-product', [ProductController::class, 'store'])->name('dashboard.admin.products.store');
        Route::resource('products', ProductController::class);
        Route::get('/edit-product/{id}', [EditProduct::class, 'edit'])->name('dashboard.admin.products.edit');
        Route::put('/edit-product/{id}', [ProductController::class, 'update'])->name('dashboard.admin.products.update');
        Route::delete('/delete-product/{id}', [ProductController::class, 'destroy'])->name('dashboard.admin.products.destroy');
        Route::get('/inventory', ProductList::class)->name('dashboard.admin.products.inventory');
        // discount
        Route::get('/discounts', DiscountList::class)->name('dashboard.admin.products.discount');
        Route::post('/add-discount', [DiscountController::class, 'store'])->name('dashboard.admin.products.discount.store');
        Route::put('/edit-discount/{id}', [DiscountController::class, 'update'])->name('dashboard.admin.products.discount.update');
        Route::delete('/delete-discount/{id}', [DiscountController::class, 'destroy'])->name('dashboard.admin.products.discount.destroy');
    });
    Route::get('/dashboard-admin/orders', OrderList::class)->name('dashboard.admin.orders');
    Route::get('/dashboard-admin/reviews', ProductList::class)->name('dashboard.admin.reviews');
    Route::get('/dashboard-admin/users', UserList::class)->name('dashboard.admin.users');
    Route::get('/dashboard-admin/users/{user}/edit', UserList::class)->name('dashboard.admin.users.edit');
    Route::delete('/dashboard-admin/users/{user}', UserList::class)->name('dashboard.admin.users.destroy');
    Route::get('/dashboard-admin/profile', ProductList::class)->name('dashboard.admin.profile');
});

require __DIR__ . '/auth.php';
