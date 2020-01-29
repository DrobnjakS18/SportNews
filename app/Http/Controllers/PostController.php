<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $postService = new PostService();

        $item = $postService::getById($id);


        return view('pages.single_post')->with(compact('item'));
    }
}
