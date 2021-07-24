<?php

namespace App\Providers;

use App\Locale;
use App\Models\City;
use App\Models\Currency;
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
            $session_currency_code = session()->get('currency', env('MAIN_CURRENCY_CODE'));
            $main_currency = Currency::where('code', '=', $session_currency_code)->first();
            $currencies = Currency::where('is_active', 1)->where('code', '!=', $session_currency_code)->get();
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

            $header_price_range = $this->flower_price_range_menu($main_currency);
            if ($count_cart_items) {
                foreach ($count_cart_items as $item) {
                    $product = Product::where('id', $item['product_id'])->first();
                    $product_price = $product->updated_price;
                    $product = $product->toarray();
                    $product['size_title'] = '';
                    $product['qty'] = $item['qty'];
                    $product['price'] = $product_price;
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
                    $product['price'] = $product_price;
                    array_push($products, $product);
                    $total_price += $product_price * $item['qty'];
                    $product_qty += $item['qty'];

                }
            }
            $count_wish_items = session()->get('wish');
            if ($count_wish_items) {

                $wish_count = count($count_wish_items);
            }
            $categories = Category::all();
            $types = Type::all();
            $intendeds = Intended::all();

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
                ->with('currencies', $currencies)
                ->with('main_currency', $main_currency)
                ->with('header_price_range', $header_price_range)
                ->with('wish_count', $wish_count);
        });

    }

    protected function flower_price_range_menu($currency): array
    {
        return [
            [
                'href' => route('shop') . '?price[]=0-10000',
                'title' => $this->get_price_range_title($currency, 10000)
            ],
            [
                'href' => route('shop') . '?price[]=10000-25000',
                'title' => $this->get_price_range_title($currency, 10000, 25000)
            ],
            [
                'href' => route('shop') . '?price[]=25000-50000',
                'title' => $this->get_price_range_title($currency, 25000,50000 )
            ],
            [
                'href' => route('shop') . '?price[]=50000-200000',
                'title' => $this->get_price_range_title($currency, false, 200000)
            ],
        ];
    }

    protected function get_price_range_title($currency, $from_price = null, $to_price = null)
    {

        if ($from_price and !$to_price) {
            if ($currency->left_icon) {
                $price = $currency->left_icon . ' ' . ($from_price * $currency->value);
            } else {
                $price = ($from_price * $currency->value) . ' ' . $currency->right_icon;
            }
            $locale_variable = 'price_from';
            $locale_value = ['price_from' => $price];
        } elseif ($to_price and !$from_price) {
            if ($currency->left_icon) {
                $price = $currency->left_icon . ' ' . ($to_price * $currency->value);
            } else {
                $price = ($to_price * $currency->value) . ' ' . $currency->right_icon;
            }
            $locale_variable = 'price_to';
            $locale_value = ['price_to' => $price];
        } else {
            if ($currency->left_icon) {
                $from_price_info = $currency->left_icon . ' ' . ($from_price * $currency->value);
                $to_price_info = $currency->left_icon . ' ' . ($to_price * $currency->value);
            } else {
                $from_price_info = ($from_price * $currency->value) . ' ' . $currency->right_icon;
                $to_price_info = ($to_price * $currency->value) . ' ' . $currency->right_icon;
            }
            $locale_variable = 'price_from_to';
            $locale_value = ['from_price' => $from_price_info, 'to_price' => $to_price_info];
        }

        return trans('header.' . $locale_variable, $locale_value);
    }
}
