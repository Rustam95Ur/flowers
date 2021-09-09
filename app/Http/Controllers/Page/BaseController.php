<?php


namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Shop\PaymentController;
use App\Locale;
use App\Models\Pages\Banner;
use App\Models\Products\Currency;
use App\Models\Pages\Gallery;
use App\Models\Products\Product;
use App\Models\Products\Size;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Page;
use App\Models\Pages\Comment;


class BaseController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function home()
    {
        $flowers_count = Product::count();
        $flowers = Product::where('is_extra', 0)->orderByRaw(' -sort_id DESC')->limit(50)->get();
        $banners = Banner::where('page', 'home')->get();
        $temp_featured_flowers = [];
        $sale_flowers_array = [];
        foreach ($flowers as $flower) {
            $product_price = $flower->updated_price;
            $is_sale = false;
            $sale_value = false;
            if ($flower->sale_value) {
                $is_sale = true;
                $sale_value = $flower->sale_value->sale;
            }
            $flower_title = $flower->getTranslatedAttribute('title', Locale::lang(), 'fallbackLocale');
            $product = $flower->toarray();
            $product['updated_price'] = $product_price;
            $product['title'] = $flower_title;
            $product['is_sale'] = $is_sale;
            $product['sale_value'] = $sale_value;
            $product['sale_price'] = $flower->sale_price;
            array_push($temp_featured_flowers, $product);
            array_push($sale_flowers_array, $product);
        }
        $temp_array = [];
        $featured_flowers = [];
        $product_ratings = Comment::selectRaw('ROUND(AVG(rating)) rating, product_id')
            ->where('product_id', '!=', null)
            ->where('is_active', 1)
            ->groupBy('product_id')
            ->get();
        if ($temp_featured_flowers) {
            while (True) {
                array_push($temp_array, $temp_featured_flowers[0]);
                if (count($temp_array) == 8 or (count($temp_featured_flowers) < 2)) {
                    array_push($featured_flowers, $temp_array);
                    $temp_array = [];
                }
                array_shift($temp_featured_flowers);
                if (count($temp_featured_flowers) == 0) {
                    break;
                }
            }
        }
        $comments = Comment::where('product_id', null)->get();
        return view('pages.home', [
            'featured_flowers' => $featured_flowers,
            'sale_flowers' => $sale_flowers_array,
            'product_count' => $flowers_count,
            'comments' => $comments,
            'product_ratings' => $product_ratings->toarray(),
            'banners' => $banners
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function contact()
    {
        return view('pages.contact');
    }


    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function checkout()
    {
        $user = false;
        if(Auth::guard('client')->check())
        {
          $user = Auth::guard('client')->user();
        }

        if($session_one_product = session()->get('one_product')) {
            $products = $session_one_product['products'];
            $total_sum = $session_one_product['total_sum'];
            $type = 'one_product';
        } else {
            $session_cart_products = $this->get_session_cart_products();
            $products = $session_cart_products['products'];
            $total_sum = $session_cart_products['total_sum'];
            $type = 'some_products';
        }
        $sale = new PaymentController();
        $update_total_sum = $sale->getSaleForPrice($total_sum);
        if(count($products) > 0) {
            return view('cart.checkout', [
                'checkout_products' => $products,
                'total_sum' => $update_total_sum['price'],
                'sale' => $update_total_sum['sale'],
                'product_pay_type' => $type,
                'user' => $user
            ]);
        } else {
            return redirect()->back();
        }
    }


    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function information_page($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 'ACTIVE')->firstOrFail();

        return view('pages.information', [
            'page' => $page
        ]);
    }

    /**
     * @param $city_id
     * @return RedirectResponse
     */
    public function select_city($city_id): RedirectResponse
    {
        session()->put('city', $city_id);
        session()->put('city_modal_disable', true);
        return redirect()->back();
    }

    /**
     * @param $currency_id
     * @return RedirectResponse
     */
    public function select_currency($currency_id): RedirectResponse
    {
        $currency = Currency::find($currency_id);
        session()->put('currency', $currency->code);
        return redirect()->back();
    }

    /**
     * @return JsonResponse
     */
    public function select_city_close(): JsonResponse
    {
        session()->put('city_modal_disable', true);
        return response()->json(['message' => 'success'], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }


    /**
     * @return Application|Factory|View
     */
    public function galleries()
    {
        $images = Gallery::all();

        return view('pages.gallery', [
            'gallery_images' => $images
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function calculator()
    {
        return view('pages.calculator');
    }

    /**
     * @return array
     */
    protected function get_session_cart_products(): array
    {
        $carts_product = session()->get('cart');
        $size_product = session()->get('size_cart');

        $products = [];
        $total_sum = 0;
        if($carts_product) {
            foreach ($carts_product as $item) {
                $product = Product::where('id', '=', $item['product_id'])->first();
                $product_price = $product->updated_price;
                $results = [
                    'id' => $product->id,
                    'title' => $product->getTranslatedAttribute('title', Locale::lang(), 'fallbackLocale'),
                    'price' => $product_price,
                    'size_title' => '',
                    'qty' => $item['qty']
                ];
                array_push($products, $results);
                $total_sum += $product_price * $item['qty'];
            }
        }
        if ($size_product) {
            foreach ($size_product as $item) {
                $product = Product::where('id', '=', $item['product_id'])->first();
                $product_price = $item['sizes']['price'];
                $size_info = Size::find($item['sizes']['id']);
                $results = [
                    'id' => $product->id,
                    'title' => $product->getTranslatedAttribute('title', Locale::lang(), 'fallbackLocale'),
                    'price' => $product_price,
                    'size_title' => '(' . $size_info->getTranslatedAttribute('title', Locale::lang(), 'fallbackLocale') . ')',
                    'qty' => $item['qty']
                ];
                array_push($products, $results);
                $total_sum += $product_price * $item['qty'];
            }
        }
        return ['products' => $products, 'total_sum' => $total_sum];
    }


}
