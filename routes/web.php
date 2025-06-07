<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/category/{categoryName}', [ProductController::class, 'filterByCategory'])->name('products.filterByCategory');


    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

});

Route::resource('orders', OrderController::class);
// Public order form (no login required)
Route::get('/order', [OrderController::class, 'create']);
Route::post('/order', [OrderController::class, 'store']);

// Admin order list
Route::middleware(['auth'])->get('/admin/orders', [OrderController::class, 'index']);




require __DIR__.'/auth.php';
