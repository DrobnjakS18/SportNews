<?php


namespace App\Services;


use App\Repositories\LikeRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class LikeService
{

    /**
     * Store new vote
     * @param $postId
     * @param $commentId
     * @param $action
     * @return object
     */
    static  public function store($postId,$commentId,$action)
    {
        $vote = LikeRepository::create(Auth::user()->id,$postId,$commentId,$action);

            $likeCount = $vote->whereVoteAndComment_id('like',$commentId)->count();
            $dislikeCount = $vote->whereVoteAndComment_id('dislike',$commentId)->count();

            CommentService::updateCommentVotes($commentId,$likeCount,$dislikeCount);

            return (object) [
                'votesLike' => $likeCount,
                'votesDislike' => $dislikeCount,
            ];
    }


    /**
     * Get sorted votes
     */
    static public function getSortedVotes($commentId,$vote)
    {
        return LikeRepository::sortedByVotes($commentId,$vote);
    }




}
