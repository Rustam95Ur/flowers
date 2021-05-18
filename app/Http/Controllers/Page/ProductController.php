<?php


namespace App\Http\Controllers\Page;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Filters\ProductFilter;
use App\Models\Size;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class ProductController extends Controller
{
    /***
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $featured_flowers = Product::limit(10)->get();
        $flower = Product::where('slug', $slug)->firstOrFail();
        $comments = Comment::where('product_id', $flower->id)->where('is_active', 1)->get();
        return view('products.show', [
            'flower' => $flower,
            'comments' => $comments,
            'featured_flowers' => $featured_flowers,
        ]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function quick_view($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        return view('products.quick_view', [
            'quick_product' => $product,
        ]);
    }

    /***
     * @param ProductFilter $filters
     * @return Application|Factory|View
     */
    public function shop(ProductFilter $filters)
    {
        $products = Product::where('price', '>', 0)->filter($filters)
            ->orderBy('is_extra', 'ASC')->paginate(20);
        $colors = Color::all();
        $sizes = Size::all();
        if (request()->ajax()) {
            return view('products.list', [
                'products' => $products,
            ]);
        }
        $request_filter = request()->input();
        return view('products.shop', [
            'products' => $products,
            'colors' => $colors,
            'sizes' => $sizes,
            'filters' => $request_filter,
        ]);
    }


    public function add_comment(Request $request): \Illuminate\Http\RedirectResponse
    {
        $save_comment = new Comment();
        $save_comment->full_name = $request['name'];
        $save_comment->email = $request['email'];
        $save_comment->rating = $request['stars'];
        $save_comment->body = $request['body'];
        $save_comment->product_id = $request['product_id'];
        $save_comment->save();
        $message = 'Комментарии успешно добавлен. Скоро появится на сайте';
        return redirect()->back()->with('success', $message);
    }

}
