<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($category,$slug)
    {
        $postService = new PostService();

        $items = $postService::getAllAboutSinglePost($slug);

//        dd($items->posts);

        return view('pages.post')->with(compact('items'));
    }

    public function create()
    {
        return view('pages.postCreate');
    }

    public function store(StorePost $request)
    {
        dd($request->all());
    }
}
