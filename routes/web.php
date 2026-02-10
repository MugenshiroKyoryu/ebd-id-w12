<?php

//use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommunityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Community routes (ต้อง login เท่านั้น)
    Route::resource('community', CommunityController::class);
});

require __DIR__.'/auth.php';

/*
Route::view('/', 'shop.products.index');
Route::view('/products/{id}', 'shop.products.show')->whereNumber('id');
Route::view('/cart', 'shop.cart.index');
Route::view('/checkout', 'shop.checkout.index');
Route::view('/orders', 'shop.orders.index');
Route::view('/orders/{id}', 'shop.orders.show')->whereNumber('id');

Route::prefix('admin')->group(function () {
  Route::view('/categories', 'admin.categories.index');
  Route::view('/products', 'admin.products.index');
  Route::view('/orders', 'admin.orders.index');
  Route::view('/orders/{id}', 'admin.orders.show')->whereNumber('id');
  Route::view('/payments', 'admin.payments.index');
});


Route::get('/', [ProductController::class, 'index'])->name('shop.products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])
    ->whereNumber('id')
    ->name('shop.products.show');
*/