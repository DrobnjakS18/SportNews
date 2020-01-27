<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\PostService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
    }

    public function index()
    {
        $postService = new PostService();

        $items = $postService::getAll();

//        dd($items);

        return view('pages.home')->with(compact('items'));
    }

    public function single()
    {
        return view('pages.single_post');
    }

    public function category($name)
    {
        $postService = new PostService();

        $items = $postService::getByCategoryName($name);

        return view('pages.category')->with(compact('items','name'));
    }

    public function author($name)
    {

        return view('pages.author');
    }

    public function about()
    {

        return view('pages.about');
    }

    public function search()
    {
        return view('pages.search');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
