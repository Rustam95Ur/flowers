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


Route::middleware(['web'])->prefix(config()->get('route_prefix'))->group(function () {
    Route::get('/', [BaseController::class, 'home'])->name('home');
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('flowers_show');
    Route::get('/contact', [BaseController::class, 'contact'])->name('contact');
    Route::get('/wishlist', [BaseController::class, 'wishlist'])->name('wishlist');
    Route::get('/cart', [BaseController::class, 'cart'])->name('cart');
    Route::get('/checkout', [BaseController::class, 'checkout'])->name('checkout');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
