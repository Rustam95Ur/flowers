<?php

namespace App\Providers;

use App\Http\Controllers\Shop\CartController;
use App\Locale;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Models\Category;

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

        view()->composer('*', function ($view) {
            $product_qty = 0;
            $wish_count = 0;
            $total_price = 0;
            $products = [];
            $count_cart_items = session()->get('cart');
            if ($count_cart_items) {
                foreach ($count_cart_items as $item) {
                    $product = Product::where('id', $item['product_id'])->first()->toarray();
                    $product['qty'] = $item['qty'];
                    array_push($products, $product);
                    $total_price += $product['price'] * $item['qty'];
                    $product_qty += $item['qty'];

                }
            }
            $count_wish_items = session()->get('wish');
            if ($count_wish_items) {

                $wish_count = count($count_wish_items);
            }
            $categories  = Category::all();

            $locale = Locale::lang();
            $view->with('locale', $locale)
                ->with('qty_cart', $product_qty)
                ->with('mini_cart_products', $products,)
                ->with('mini_cart_total_price', $total_price)
                ->with('categories', $categories)
            ->with('wish_count', $wish_count);
        });

    }
}
