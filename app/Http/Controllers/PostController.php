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
     *  Display all posts in admin panel
     */
    public function adminIndex()
    {
        $items = $this->postService::getAll();

        return view('admin.pages.posts')->with(compact('items'));
    }


    /**
     *  Display all unverified posts
     */
    public function unverified()
    {
        $items = $this->postService::getByStatus('unverified');

        return view('admin.pages.posts')->with(compact('items'));
    }

    /**
     *  Display all verified posts
     */
    public function verified()
    {
        $items = $this->postService::getByStatus('verified');

        return view('admin.pages.posts')->with(compact('items'));
    }

    /**
     *  Verify post
     * @param Request $request
     * @return false|string
     */
    public function verify(Request $request)
    {
        $response = $this->postService::verify($request->id, $request->status);

        return json_encode($response);
    }

    /**
     *  Select post for editors pick
     * @param Request $request
     * @return false|string
     */
    public function select(Request $request)
    {
        $response = $this->postService::select($request->id, $request->select);

        return json_encode($response);
    }

    /**
     *  Display selected posts for editors pick
     * @return false|string
     */
    public function selected()
    {
        $items = $this->postService::getSelectedPost('selected');


        return view('admin.pages.posts')->with(compact('items'));
    }

    /**
     *  Display single post in admin panel
     */
    public function adminShow($id)
    {
        $item = $this->postService::getById($id);

        return view('admin.pages.single_post')->with(compact('item'));
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

    /**
     * Remove specified question.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postService::delete($id);

        return redirect()->route('admin.post.index');
    }
}
