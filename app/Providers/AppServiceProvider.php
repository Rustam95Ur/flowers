<?php

namespace App\Providers;

use App\Locale;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view)
        {
            $product_count = 0;
//            $countCartItems = Session::get('cart');
//            if ($countCartItems != false ) {
//                foreach ($countCartItems as $item) {
//                    $count += $item['qty'];
//                }
//            }
            $locale = Locale::lang();
            $view->with('locale', $locale)->with('product_cart', $product_count);
        });
    }
}
