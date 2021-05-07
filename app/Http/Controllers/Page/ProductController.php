<?php


namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Filters\ProductFilter;

//use App\Models\Comment;
//use App\Models\Gallery;

class ProductController extends Controller
{

    public function show($slug)
    {
        $flower = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', [
            'flower' => $flower,
        ]);
    }

    public function shop(ProductFilter $filters)
    {
        $products = Product::where('price', '>', 0)->filter($filters)
            ->orderByRaw('-id DESC')->paginate(1);
        return view('products.shop', [
            'products' => $products
        ]);
    }

}
