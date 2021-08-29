<?php


namespace App\Http\Controllers\Page;

use App\Models\Pages\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Color;
use App\Models\Products\Product;
use App\Filters\ProductFilter;
use App\Models\Products\Size;
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
        $product_ratings = Comment::selectRaw('ROUND(AVG(rating)) rating, product_id')
            ->where('product_id', '!=', null)
            ->where('is_active', 1)
            ->groupBy('product_id')
            ->get();
        $flower = Product::where('slug', $slug)->firstOrFail();
        $featured_flowers = Product::where('id', '!=', $flower->id)->limit(10)->orderByRaw('-sort_id DESC')->get();
        $comments = Comment::where('product_id', $flower->id)->where('is_active', 1)->get();
        return view('products.show', [
            'flower' => $flower,
            'comments' => $comments,
            'featured_flowers' => $featured_flowers,
            'product_ratings' => $product_ratings->toarray(),

        ]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function quick_view($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $product_ratings = Comment::selectRaw('ROUND(AVG(rating)) rating, product_id')
            ->where('product_id', '=', $product->id)
            ->where('is_active', 1)
            ->groupBy('product_id')
            ->get();
        return view('products.quick_view', [
            'quick_product' => $product,
            'product_ratings' => $product_ratings->toArray(),
        ]);
    }

    /**
     * @param $product_id
     * @param $size_id
     * @return JsonResponse
     */
    public function size_price($product_id, $size_id): JsonResponse
    {
        $product = Product::find($product_id);
        $product_price = $product->size_price($product->id, $size_id, $product->updated_price);
        return response()->json(['price' => $product_price], 201, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);

    }

    /***
     * @param ProductFilter $filters
     * @return Application|Factory|View
     */
    public function shop(ProductFilter $filters)
    {
        $products = Product::where('price', '>', 0)->filter($filters)->orderByRaw(' -sort_id DESC')
            ->orderBy('is_extra', 'ASC')->paginate(20);
        $colors = Color::all();
        $sizes = Size::all();
        $product_ratings = Comment::selectRaw('ROUND(AVG(rating)) rating, product_id')
            ->where('product_id', '!=', null)
            ->where('is_active', 1)
            ->groupBy('product_id')
            ->get();
        if (request()->ajax()) {
            return view('products.list', [
                'products' => $products,
                'product_ratings' => $product_ratings->toarray(),
            ]);
        }

        $request_filter = request()->input();
        return view('products.shop', [
            'products' => $products,
            'colors' => $colors,
            'sizes' => $sizes,
            'filters' => $request_filter,
            'product_ratings' => $product_ratings->toarray(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function add_comment(Request $request): RedirectResponse
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
