<?php


namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\Models\Product;

//use App\Models\Comment;
//use App\Models\Gallery;

class BaseController extends Controller
{

    public function home()
    {
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
//        $comments = Comment::all();
        return view('pages.home', [
            'featured_flowers' => $featured_flowers,
//            'clients'  => $clients,
//            'galleries'  => $galleries
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

}
