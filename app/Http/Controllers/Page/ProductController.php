<?php


namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Filters\ProductFilter;
use App\Models\Size;
use App\Models\Category;

//use App\Models\Comment;
//use App\Models\Gallery;

class ProductController extends Controller
{

    public function show($slug)
    {
        $featured_flowers = Product::limit(10)->get();
        $flower = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', [
            'flower' => $flower,
            'featured_flowers' => $featured_flowers,
        ]);
    }

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
