<?php

use App\Http\Controllers\Customer\ProductsController as CustomerProductsController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\UserController;
use App\Livewire\Admin\Discounts\DiscountList;
use App\Livewire\Admin\OrderList;
use App\Livewire\Admin\ProductList;
use App\Livewire\Admin\Products\AddProduct;
use App\Livewire\Admin\Products\EditProduct;
use App\Livewire\Admin\Reviews\ReviewList;
use App\Livewire\Admin\UserList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.home.index');
})->name('dashboard');

Route::group(['prefix' => '/product'], function () {
    Route::get('/collection', [CustomerProductsController::class, 'index'])->name('product.collections');
    Route::get('/collection/search', [CustomerProductsController::class, 'search'])->name('product.collections.search');
    Route::get('/collection/add-cart/{id}', [CustomerProductsController::class, 'addCart'])->name('product.collections.addCart');
    Route::post('/collection/update-cart', [CustomerProductsController::class, 'updateCart'])->name('product.collections.updateCart');
    Route::delete('/collection/delete-cart/{id}', [CustomerProductsController::class, 'deleteCart'])->name('product.collections.deleteCart');
    Route::get('/cart', [CustomerProductsController::class, 'myCart'])->name('product.myCart');

    // checkout
    Route::get('/checkout', [CustomerProductsController::class, 'checkout'])->name('checkout');
});

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

    Route::group(['prefix' => '/dashboard-admin/users'], function () {
        // users
        Route::get('/list', UserList::class)->name('dashboard.admin.users');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('dashboard.admin.users.update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.admin.users.destroy');
    });
    Route::get('/dashboard-admin/orders', OrderList::class)->name('dashboard.admin.orders');
    // reviews
    Route::get('/dashborad-admin/product/reviews', ReviewList::class)->name('dashboard.admin.products.review.list');
    Route::get('/dashboard-admin/users/{user}/edit', UserList::class)->name('dashboard.admin.users.edit');
    Route::delete('/dashboard-admin/users/{user}', UserList::class)->name('dashboard.admin.users.destroy');
    Route::get('/dashboard-admin/profile', ProductList::class)->name('dashboard.admin.profile');
});

require __DIR__ . '/auth.php';
