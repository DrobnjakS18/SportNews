<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Services\CommentService;
use App\Services\LikeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Store post comment
     * @param StoreComment $request
     * @return false|string
     */
    public function store(StoreComment $request)
    {
        $commentService = new CommentService();

        $response = $commentService::store(clean($request->message,'p'),$request->post,Auth::user()->id,$request->recaptcha);

        return json_encode($response);
    }

    /**
     * Store comment reply
     * @param StoreComment $request
     * @return false|string
     */
    public function reply(StoreComment $request)
    {
        $commentService = new CommentService();

        $response = $commentService::store(clean($request->message,'p'),$request->post,Auth::user()->id,$request->recaptcha,$request->comment);

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

}
