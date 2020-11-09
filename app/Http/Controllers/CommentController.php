<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Services\CommentService;
use App\Services\LikeService;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $commentService;

    public function __construct()
    {

        $this->commentService = new CommentService();
    }

    /**
     *  Display only comments in admin panel
     */
    public function adminIndex()
    {
        $items = $this->commentService::getAllComments();
        $comments = $items['data'];
        $allComments = $items['all'];

        return view($items['view'])->with(compact('comments','allComments'));
    }

    /**
     *  Display all unverified comments
     */
    public function unverified()
    {
        $items = $this->commentService::getByStatus('unverified');
        $comments = $items['data'];
        $allComments = $items['all'];


        return view($items['view'])->with(compact('comments','allComments'));
    }

    /**
     *  Display all verified comments
     */
    public function verified()
    {
        $items = $this->commentService::getByStatus('verified');
        $comments = $items['data'];
        $allComments = $items['all'];

        return view($items['view'])->with(compact('comments','allComments'));
    }

    /**
     *  Verify comment
     * @param Request $request
     * @return false|string
     */
    public function verify(Request $request)
    {
        $response = $this->commentService::verify($request->id, $request->status);

        return json_encode($response);
    }


    /**
     * Store post comment
     * @param StoreComment $request
     * @return false|string
     */
    public function store(StoreComment $request)
    {
        $response = $this->commentService::store(clean($request->message,'p'),$request->post,Auth::user()->id,$request->recaptcha);

        return json_encode($response);
    }

    /**
     * Store comment reply
     * @param StoreComment $request
     * @return false|string
     */
    public function reply(StoreComment $request)
    {
        $response = $this->commentService::store(clean($request->message,'p'),$request->post,Auth::user()->id,$request->recaptcha,$request->comment);

        return json_encode($response);
    }

    /**
     * Store like
     * @param Request $request
     * @return false|string
     */
    public function vote(Request $request)
    {
        $likeService = new LikeService();

        $response = $likeService::store($request->postId,$request->commentId,$request->action);

        return json_encode($response);
    }

    /**
     * Show all comments for post
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function comments($slug)
    {
        $items = $this->commentService::getCommentsByPost($slug);

        return view('pages.all_comments')->with(compact('items'));
    }

    /**
     * Display sorted comments
     * @param $slug
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sort($slug,$type)
    {
        $items = $this->commentService::getSortedComments($slug,$type);

        return view('pages.all_comments')->with(compact('items'));
    }


    /**
     * Remove specified comment.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->commentService::delete($id);

        return redirect()->route('admin.comment.index');
    }

    /**
     * Remove specified answer.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyAnswer($id)
    {
        $this->commentService::delete($id);

        return redirect()->route('admin.answer.index');
    }


}
