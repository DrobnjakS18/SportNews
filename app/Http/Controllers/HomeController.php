<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateContact;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\SubscriptionService;
use App\Services\UserService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $postService;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->postService = new PostService();
    }

    /**
     * Display home page.
     */
    public function index()
    {
        $items = $this->postService::getAllWithUsers();

        return view('pages.home')->with(compact('items'));
    }


    /**
     * Display category page.
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($name)
    {
        $items = $this->postService::getByCategoryName($name);

        return view('pages.category')->with(compact('items', 'name'));
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

        $items = $this->postService::getPostBySearch($search);


        return view('pages.search')->with(compact('items', 'search'));
    }

    /**
     * Display contact page.
     */
    public function contact()
    {
        return view('pages.contact');

    }

    public function contactEmail(ValidateContact $request)
    {

        $mailService = new SubscriptionService();

        $response = $mailService::email($request->surname,$request->email,$request->subject,$request->message);

        return json_encode($response);
    }



}
