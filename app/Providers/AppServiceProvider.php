<?php

namespace App\Providers;

use App\Locale;
use App\Models\City;
use App\Models\Intended;
use App\Models\Product;
use App\Models\Size;
use App\Models\Type;
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
            $selected_city = session()->get('city', 2);
            if ($selected_city) {
                $city_title = City::where('id', $selected_city)->select('title')->first();
            }
            $cities = City::orderBy('title', 'ASC')->get();
            $pages = Page::where('status', 'ACTIVE')->get();
            $count_cart_items = session()->get('cart');
            $size_cart_items = session()->get('size_cart');
            if ($count_cart_items) {
                foreach ($count_cart_items as $item) {
                    $product = Product::where('id', $item['product_id'])->first();
                    $product_price = $product->updated_price;
                    $product = $product->toarray();
                    $product['size_title'] = '';
                    $product['qty'] = $item['qty'];
                    $product['price'] =  $product_price;
                    array_push($products, $product);
                    $total_price += $product_price * $item['qty'];
                    $product_qty += $item['qty'];

                }
            }
            if ($size_cart_items) {
                foreach ($size_cart_items as $item) {
                    $product = Product::where('id', $item['product_id'])->first();
                    $product_price = $item['sizes']['price'];
                    $product = $product->toarray();
                    $size_info = Size::find($item['sizes']['id']);
                    $size_title = '(' . $size_info->title . ')';
                    $product['size_title'] = $size_title;
                    $product['qty'] = $item['qty'];
                    $product['price'] =  $product_price;
                    array_push($products, $product);
                    $total_price += $product_price * $item['qty'];
                    $product_qty += $item['qty'];

                }
            }
            $count_wish_items = session()->get('wish');
            if ($count_wish_items) {

                $wish_count = count($count_wish_items);
            }
            $categories  = Category::all();
            $types  = Type::all();
            $intendeds  = Intended::all();

            $locale = Locale::lang();
            $view->with('locale', $locale)
                ->with('qty_cart', $product_qty)
                ->with('mini_cart_products', $products)
                ->with('mini_cart_total_price', $total_price)
                ->with('categories', $categories)
                ->with('selected_city', $selected_city)
                ->with('selected_city_name', $city_title)
                ->with('pages', $pages)
                ->with('types', $types)
                ->with('cities', $cities)
                ->with('intendeds', $intendeds)
            ->with('wish_count', $wish_count);
        });

    }
}
