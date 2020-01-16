<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home');
    }

    public function single()
    {
        return view('pages.single_post');
    }

    public function category($category)
    {
        return view('pages.category')->with(compact('category'));
    }

    public function author()
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
