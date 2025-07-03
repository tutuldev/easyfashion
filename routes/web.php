<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\FroProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/product-category', function () {
    return view('product-category');
});

Route::get('/category/{slug}', [CategoryController::class, 'singleCategoryShow'])->name('category.single.show');


Route::get('/', [HomeController::class, 'index']);


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

    // order notification
    // routes/web.php বা routes/api.php (যেখানে সুবিধা)
    Route::get ('/notifications/orders',        [OrderController::class,'latestOrders']);
    Route::post('/notifications/orders/mark-read', [OrderController::class,'markOrdersRead']);


});

Route::resource('orders', OrderController::class);
// Public order form (no login required)
Route::get('/order', [OrderController::class, 'create']);
Route::post('/order', [OrderController::class, 'store'])->name('order');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');

// Admin order list
Route::middleware(['auth'])->get('/admin/orders', [OrderController::class, 'index']);
Route::get('/order-confirmation/{order}', [OrderController::class, 'show'])->name('order.confirmation');



Route::get('/product/{id}', [FroProductController::class, 'show'])->name('single-product');

// cart
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/checkout', function () {
    return view('checkout');
});


// search
Route::get('/search', [SearchController::class, 'search'])->name('search');

// shop page
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
//how to order page
Route::get('/how-to-order', function () {
    return view('how-to-order');
});



require __DIR__.'/auth.php';
