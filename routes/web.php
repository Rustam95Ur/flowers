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
use App\Http\Controllers\Mail\BaseController as MailBase;
use App\Http\Controllers\Page\ProductController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\PaymentController;


Route::middleware(['web'])->prefix(config()->get('route_prefix'))->group(function () {
    Route::get('/', [BaseController::class, 'home'])->name('home');

    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product_show');
    Route::post('/product/comment/add', [ProductController::class, 'add_comment'])->name('product_add_comment');
    Route::get('/product/quick-view/{id}', [ProductController::class, 'quick_view'])->name('product_quick_view');
    Route::get('/product/size-price/{product_id}/{size_id}', [ProductController::class, 'size_price'])->name('product_size_price');


    Route::get('/contact', [BaseController::class, 'contact'])->name('contact');
    Route::post('/contact/message/send', [MailBase::class, 'contact_message_send'])->name('contact_message_send');

    Route::get('/wishlists', [CartController::class, 'wishlists'])->name('wishlists');
    Route::get('/wishlist/{product_id}/{type}', [CartController::class, 'update_wishlist'])->name('update_wishlist');
    Route::get('/wishlists/count', [CartController::class, 'count_wish'])->name('count_wish');

    Route::get('/cart/update/{product_id}/{qty}/{type}', [CartController::class, 'update_to_cart'])->name('update_to_cart');
    Route::get('/cart/update/{product_id}/{qty}/{type}/{size_id}', [CartController::class, 'update_to_cart_size'])->name('update_to_cart_size');
    Route::get('/cart/count', [CartController::class, 'count_cart'])->name('count_cart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    Route::get('/checkout', [BaseController::class, 'checkout'])->name('checkout');
    Route::post('/payment', [PaymentController::class, 'index'])->name('payment');


    Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

    Route::get('/information/{slug}', [BaseController::class, 'information_page'])->name('information_page');
    Route::get('/gallery', [BaseController::class, 'galleries'])->name('galleries');

    Route::get('/calculator', [BaseController::class, 'calculator'])->name('calculator');
    Route::post('/calculator/send', [MailBase::class, 'calculator_send'])->name('calculator_send');

    Route::get('/select-city/{city_id}', [BaseController::class, 'select_city'])->name('select_city');
    Route::get('/select-currency/{currency_id}', [BaseController::class, 'select_currency'])->name('select_currency');
    Route::get('/select-city-close', [BaseController::class, 'select_city_close'])->name('select_city_close');

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
