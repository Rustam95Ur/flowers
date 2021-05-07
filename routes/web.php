<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\Page\BaseController;
use App\Http\Controllers\Page\ProductController;
use App\Http\Controllers\Shop\CartController;


Route::middleware(['web'])->prefix(config()->get('route_prefix'))->group(function () {
    Route::get('/', [BaseController::class, 'home'])->name('home');
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product_show');
    Route::get('/contact', [BaseController::class, 'contact'])->name('contact');
    Route::get('/wishlists', [CartController::class, 'wishlists'])->name('wishlists');
    Route::get('/wishlist/{product_id}/{type}', [CartController::class, 'update_wishlist'])->name('update_wishlist');
    Route::get('/wishlists/count', [CartController::class, 'count_wish'])->name('count_wish');
    Route::get('/cart/update/{product_id}/{qty}/{type}', [CartController::class, 'update_to_cart'])->name('update_to_cart');
    Route::get('/cart/count', [CartController::class, 'count_cart'])->name('count_cart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [BaseController::class, 'checkout'])->name('checkout');
    Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
