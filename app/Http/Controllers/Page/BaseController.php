<?php


namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;

//use App\Models\Client;
//use App\Models\Comment;
//use App\Models\Gallery;

class BaseController extends Controller
{

    public function home()
    {
//        $clients = Client::all();
//        $galleries = Gallery::limit(10)->orderBy('created_at', 'DESC')->get();
//        $comments = Comment::all();
        return view('pages.home', [
//            'comments'  => $comments,
//            'clients'  => $clients,
//            'galleries'  => $galleries
        ]);
    }


}
