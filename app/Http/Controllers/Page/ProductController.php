<?php


namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\Models\Product;
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

}
