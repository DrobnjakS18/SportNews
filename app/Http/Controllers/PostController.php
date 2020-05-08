<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Services\CategoryService;
use App\Services\PostService;
use Illuminate\Http\Request;



class PostController extends Controller
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
     * Display single post page.
     * @param $category
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($category,$slug)
    {
        $items =  $this->postService::getAllAboutPost($category,$slug);

        return view('pages.post')->with(compact('items'));
    }

    /**
     * Display insert post form page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categoryService = new CategoryService();

        $categories = $categoryService::getAll();

        return view('pages.post_create')->with(compact('categories'));
    }

    /**
     * Store a newly created post.
     * @param StorePost $request
     * @return json
     */
    public function store(StorePost $request)
    {
       $response =  $this->postService::store(clean($request->title,'title'),$request->url,clean($request->category,'p'),clean($request['content']),$request->tags);

       return json_encode($response);
    }

    /**
     * Store a newly created post.
     * @param Request $request
     * @return json
     */
    public function upload(Request $request)
    {
       $response =  $this->postService::uploadImage('post/images',$request->file('file'));

       return json_encode($response);
    }
}
