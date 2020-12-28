<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tagService;

    public function __construct()
    {
        $this->tagService =  new TagService();
    }

    /**
     * Show all posts by selected tag
     */
    public function show($tag)
    {
        $items = $this->tagService::getByName($tag);

//        dd($items);
        return view('pages.tag')->with(compact('items'));

    }
}
