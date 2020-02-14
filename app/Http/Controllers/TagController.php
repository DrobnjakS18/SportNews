<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * Show all posts by selected tag
     */
    public function show($tag)
    {
        $tagService = new TagService();

        $items = $tagService::getByName($tag);

        return view('pages.tag')->with(compact('items'));

    }
}
