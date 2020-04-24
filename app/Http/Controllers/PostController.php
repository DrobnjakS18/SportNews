<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Services\CategoryService;
use App\Services\PostService;
use Illuminate\Http\Request;



class PostController extends Controller
{

    /**
     * Display single post page.
     * @param $category
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($category,$slug)
    {
        $postService = new PostService();

        $items = $postService::getAllAboutPost($category,$slug);

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
       $postService = new PostService();

       $response = $postService::store(clean($request->title,'title'),$request->file('file'),clean($request->category,'p'),clean($request['content']),$request->tags);

       return json_encode($response);
    }

    /**
     * Store a newly created post.
     * @param Request $request
     * @return json
     */
    public function upload(Request $request)
    {
       $postService = new PostService();

       $response = $postService::uploadImage($request->file('file'));

       return json_encode($response);
    }
}
