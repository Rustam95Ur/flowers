<?php


namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Product;
use TCG\Voyager\Models\Page;
use App\Models\Comment;

class BaseController extends Controller
{

    public function home()
    {
        $flowers_count = Product::count();
        $flowers = Product::all()->toarray();
        $temp_featured_flowers = $flowers;
        $temp_array = [];
        $featured_flowers = [];
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
            'sale_flowers'  => $flowers,
            'product_count'  => $flowers_count,
            'comments'  => $comments
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contact()
    {
        return view('pages.contact');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function checkout()
    {
        return view('cart.checkout');
    }


    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function select_city($city_id): \Illuminate\Http\RedirectResponse
    {
        session()->put('city', $city_id);
        return redirect()->back();
    }

    public function galleries()
    {
        $images = Gallery::all();

        return view('pages.gallery', [
            'gallery_images' => $images
        ]);
    }

    public function calculator()
    {
        return view('pages.calculator');
    }



}
