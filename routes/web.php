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

Route::group([
    'middleware' => ['web'],
    'prefix' => Config::get('route_prefix')
], function () {

    Route::get('/', [BaseController::class, 'home'])->name('home');

//    Route::get('/about', 'Page\BaseController@about')->name('about');
//    Route::get('/contact', 'Page\BaseController@contact')->name('contact');
//    Route::get('/services', 'Page\ServiceController@index')->name('services');
//    Route::get('/service/{id}', 'Page\ServiceController@show')->name('service');
//
//    Route::get('/shop', 'Shop\BaseController@index')->name('shop');
//    Route::get('/shop/category/{id}', 'Shop\BaseController@categoryShow')->name('category');
//
//    Route::get('/product/{id}', 'Shop\ProductController@show')->name('product');
//    Route::get('/product/search/{name}', 'Shop\ProductController@search');
//
//    Route::get('/cart', 'Shop\CartController@cart')->name('cart');
//    Route::get('/cart/count', 'Shop\CartController@countItemCart');
//
//    Route::get('/cart/add/{product_id}/{qty}', 'Shop\CartController@addCart');
//    Route::get('/cart/remove/{product_id}/{qty}', 'Shop\CartController@removeItemCart');
//
//    Route::get('/checkout', 'Shop\CheckoutController@checkout')->name('checkout');
//
//    Route::post('/send/request', 'Mail\BaseController@requestForm')->name('request');
//    Route::post('/send/mail', 'Mail\BaseController@mailForm')->name('mail');
//
//    Exline routes
//    Route::get('/shipping/origin', 'Shipping\ExlineController@getOrigin');
//    Route::get('/shipping/destinations/{county}', 'Shipping\ExlineController@getDestinations');
//    Route::get('/shipping/calculate/{origin_id}/{destination_id}/{weight}', 'Shipping\ExlineController@getCalculate');
//
//    Route::post('/payment', 'Shop\PaymentController@index')->name('payment');
//    Route::get('payment/success/{id}', 'Shop\PaymentController@success')->name('payment-success');
//    Route::get('payment/error/{id}', 'Shop\PaymentController@error')->name('payment-error');
});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
