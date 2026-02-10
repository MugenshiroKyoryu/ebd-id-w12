<?php

use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommunityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* =========================
   Dashboard
========================= */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* =========================
   Auth routes
========================= */
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('community', CommunityController::class);
});

require __DIR__.'/auth.php';


/* =========================
   SHOP ROUTES
   เป็นลิงก์ธรรมดา
========================= */

Route::get('/shop', [ProductController::class, 'index'])
    ->name('shop.products.index');

Route::get('/shop/products/{id}', [ProductController::class, 'show'])
    ->whereNumber('id')
    ->name('shop.products.show');

Route::view('/cart', 'shop.cart.index');
Route::view('/checkout', 'shop.checkout.index');
Route::view('/orders', 'shop.orders.index');
Route::view('/orders/{id}', 'shop.orders.show')->whereNumber('id');


/* =========================
   ADMIN ROUTES
========================= */

Route::prefix('admin')->group(function () {

  Route::view('/categories', 'admin.categories.index');
  Route::view('/products', 'admin.products.index');
  Route::view('/orders', 'admin.orders.index');
  Route::view('/orders/{id}', 'admin.orders.show')->whereNumber('id');
  Route::view('/payments', 'admin.payments.index');

});
