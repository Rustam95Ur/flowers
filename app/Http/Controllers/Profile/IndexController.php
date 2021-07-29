<?php


namespace App\Http\Controllers\Profile;


use App\Http\Controllers\Controller;
use App\Locale;
use App\Models\Banner;
use App\Models\Currency;
use App\Models\Gallery;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use TCG\Voyager\Models\Page;
use App\Models\Comment;


class IndexController extends Controller
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }


    public function index()
    {
        $orders = Payment::limit(10)->get();
        return view('profile.index', [
            'orders' => $orders
        ]);
    }
}
