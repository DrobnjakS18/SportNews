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

        $items = $postService::getAllWithUsers();

        return view('pages.home')->with(compact('items'));
    }

    public function category($name)
    {
        $postService = new PostService();

        $items = $postService::getByCategoryName($name);
        
        return view('pages.category')->with(compact('items','name'));
    }

    public function author($name)
    {
        $userService = new UserService();

        $items = $userService::getByNamePostsPaginate($name);

        return view('pages.author')->with(compact('items'));
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
