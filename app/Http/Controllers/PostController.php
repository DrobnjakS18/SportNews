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
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($category,$slug)
    {
        $postService = new PostService();

        $items = $postService::getAllAboutSinglePost($slug);

//        dd($items->post->comments);

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
        return view('pages.postCreate')->with(compact('categories'));
    }

    /**
     * Store a newly created post.
     * @param StorePost $request
     * @return json
     */
    public function store(StorePost $request)
    {

        dd($request->all());
       $post = new PostService();

       $response = $post::store(clean($request->title,'title'),$request->file('file'),clean($request->category,'p'),clean($request->content),$request->tags);

       return json_encode($response);
    }

    /**
     * Store a newly created post.
     * @param Request $request
     * @return json
     */
    public function upload(Request $request)
    {
        $post = new PostService();

       $response = $post::uploadImage($request->file('file'));

       return json_encode($response);
    }
}
