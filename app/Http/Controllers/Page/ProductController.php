<?php


namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Filters\ProductFilter;
use App\Models\Size;
use App\Models\Category;


class ProductController extends Controller
{
    /***
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $featured_flowers = Product::limit(10)->get();
        $flower = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', [
            'flower' => $flower,
            'featured_flowers' => $featured_flowers,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function shop(ProductFilter $filters)
    {
        $products = Product::where('price', '>', 0)->filter($filters)
            ->orderBy('title', 'ASC')->paginate(20);
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

}
