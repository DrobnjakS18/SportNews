<?php


namespace App\Services;


use App\Repositories\LikeRepository;
use Illuminate\Support\Facades\Auth;

class LikeService
{

    /**
     * Store new vote
     */
    static  public function store($postId,$commentId,$action)
    {
        $vote = LikeRepository::create(Auth::user()->id,$postId,$commentId,$action);

            $likeCount = $vote->whereVoteAndComment_id('like',$commentId)->count();
            $dislikeCount = $vote->whereVoteAndComment_id('dislike',$commentId)->count();

            return (object) [
                'votesLike' => $likeCount,
                'votesDislike' => $dislikeCount,
            ];
    }










}
