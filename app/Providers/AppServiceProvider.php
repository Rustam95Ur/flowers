<?php

namespace App\Providers;

use App\Locale;
use App\Models\City;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use TCG\Voyager\Models\Page;

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
            $city_title = false;
            $selected_city = session()->get('city', null);
            if ($selected_city) {
                $city_title = City::where('id', $selected_city)->select('title')->first();
            }
            $cities = City::orderBy('title', 'ASC')->get();
            $pages = Page::where('status', 'ACTIVE')->get();
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
                ->with('selected_city', $selected_city)
                ->with('selected_city_name', $city_title)
                ->with('pages', $pages)
                ->with('cities', $cities)
            ->with('wish_count', $wish_count);
        });

    }
}
