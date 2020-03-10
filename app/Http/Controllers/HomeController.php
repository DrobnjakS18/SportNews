<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

//        $this->middleware('guest');
    }

    /**
     * Display home page.
     */
    public function index()
    {
        $postService = new PostService();

        $items = $postService::getAllWithUsers();

        return view('pages.home')->with(compact('items'));
    }

    /**
     * Display category page.
     */
    public function category($name)
    {
        $postService = new PostService();

        $items = $postService::getByCategoryName($name);

        return view('pages.category')->with(compact('items','name'));
    }

    /**
     * Display author page
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function author($name)
    {
        $userService = new UserService();

        $items = $userService::getByNamePostsPaginate($name);

//        dd($items);

        return view('pages.author')->with(compact('items'));
    }

    /**
     * Display about page.
     */
    public function about()
    {

        return view('pages.about');
    }

    /**
     * Display seached results page.
     */
    public function search(Request $request)
    {

        $search = $request->search;
        $post = new PostService();

        $items = $post::getPostBySearch($search);

//        dd($items);

        return view('pages.search')->with(compact('items','search'));
    }

    /**
     * Display contact page.
     */
    public function contact()
    {
        return view('pages.contact');
    }
}
