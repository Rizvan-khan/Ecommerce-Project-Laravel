<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Website\WebController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;

// ----------------------------
// 🔸 Public Route
// ----------------------------


use App\Http\Controllers\GoogleController;

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



Route::get('/', function () {
    return view('index');
});

Route::post('/add-to-cart', [CartController::class, 'add'])->name('add.to.cart');
Route::get('/get-cart-items', [CartController::class, 'getAllCartProduct']);
Route::post('/remove-cart-item', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/view-cart', [CartController::class, 'viewCart'])->name('view-cart');
Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');

// checkout route
// web.php
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place-order');


Route::get('/payment-success', [CheckoutController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment-failed', [CheckoutController::class, 'paymentFailed'])->name('payment.failed');
Route::post('/phonepe-callback', [CheckoutController::class, 'handleCallback']); // For PhonePe callback




Route::get('/totalitem', [CartController::class, 'totalitem']);

Route::post('/add-to-wishlist', [WishlistController::class, 'add'])->name('add.to.wishlist');
Route::get('/totalwishlist', [WishlistController::class, 'totalwishlist']);



Route::get('/', [WebController::class, 'getAllProducts'])->name('index');
Route::get('/product-detail/{id}', [WebController::class, 'getproductdetail'])->name('product-detail');


// ----------------------------
// 🔸 After Login - Redirect Based on Role
// ----------------------------
Route::get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('index'); // 👈 User goes to website homepage
})->middleware(['auth', 'verified'])->name('dashboard'); 
// ----------------------------
// 🔸 Admin Routes (Protected)
// ----------------------------
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () { 
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/all-category', [AdminController::class, 'allcategory'])->name('category.all-category');
    // Route::get('/product', [CategoryController::class, 'new'])->name('product.add-product');
    Route::get('/add-category', [AdminController::class, 'category'])->name('admin.category.add-category');
    // routes/web.php
    Route::get('/product',[ProductController::class, 'Product'])->name('product.add-product');
    Route::post('/product',[ProductController::class, 'store'])->name('product.add-product');
    Route::get('/all-product',[ProductController::class, 'all'])->name('product.all-product');
   // Correct way
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit-product');

Route::put('edit-product/{id}', [ProductController::class, 'update'])->name('product.edit-product');

    // Route::get('/edit-product/$id',[ProductController::class, 'all'])->name('product.edit-product/$id');
    Route::resource('/categories', CategoryController::class)->except(['create']);
});

// ----------------------------
// 🔸 User Routes (Protected)
// ----------------------------
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});


// ----------------------------
// 🔸 Profile Routes (Protected)
// ----------------------------
Route::middleware('auth')->group(function () {
      Route::get('/user-dashboard', [UserController::class, 'user_dashboard'])->name('user-dashboard');
      Route::get('/order', [UserController::class, 'user_order'])->name('order');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

// ----------------------------
// 🔸 Auth Routes
// ----------------------------
require __DIR__.'/auth.php';
