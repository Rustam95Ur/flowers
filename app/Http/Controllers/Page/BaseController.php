<?php


namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreMailForm;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use Illuminate\Support\Facades\Mail;
use App\Models\Comment;


class BaseController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function home()
    {
        $flowers_count = Product::count();
        $flowers = Product::all()->toarray();
        $banners = Banner::where('page', 'home')->get();
        $temp_featured_flowers = $flowers;
        $temp_array = [];
        $featured_flowers = [];
        $product_ratings = Comment::selectRaw('ROUND(AVG(rating)) rating, product_id')
            ->where('product_id', '!=', null)
            ->where('is_active', 1)
            ->groupBy('product_id')
            ->get();

        while (True) {
            array_push($temp_array, $temp_featured_flowers[0]);
            if (count($temp_array) == 2 or (count($temp_featured_flowers) < 2)) {
                array_push($featured_flowers, $temp_array);
                $temp_array = [];
            }
            array_shift($temp_featured_flowers);
            if (count($temp_featured_flowers) == 0) {
                break;
            }
        }
//        $galleries = Gallery::limit(10)->orderBy('created_at', 'DESC')->get();
        $comments = Comment::where('product_id', null)->get();
        return view('pages.home', [
            'featured_flowers' => $featured_flowers,
            'sale_flowers' => $flowers,
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
        $carts_product = session()->get('cart');
        if ($carts_product) {
            $products = [];
            $total_sum = 0;
            foreach ($carts_product as $item) {
                $product = Product::where('id', '=', $item['product_id'])->first();
                $results = [
                    'id' => $product->id,
                    'title' => $product->title,
                    'price' => $product->price,
                    'qty' => $item['qty']
                ];
                array_push($products, $results);
                $total_sum += $product['price'] * $item['qty'];
            }
            return view('cart.checkout', [
                'checkout_products' => $products,
                'total_sum' => $total_sum,
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
        return redirect()->back();
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




}
