<?php


namespace App\Repositories;


use App\Models\Like;

class LikeRepository
{

    public function __construct()
    {
        $this->className = 'App\Models\Like';
    }

    /**
     * Sorted votes by like or dislike
     * @param $commentId
     * @param $vote
     * @return Like
     */
    public static function sortedByVotes($commentId,$vote)
    {
        return Like::whereVoteAndComment_id($vote,$commentId)->first();
    }

    /**
     * Store new vote
     * @param $userId
     * @param $postId
     * @param $commentId
     * @param $action
     * @return Like
     */
    public static function create($userId,$postId,$commentId,$action)
    {
        $vote = new Like();

        if (isset($action)) {
            $vote->vote = $action;
        }

        if (isset($userId)) {
            $vote->user_id = $userId;
        }

        if (isset($postId)) {
            $vote->post_id = $postId;
        }

        if (isset($commentId)) {
            $vote->comment_id = $commentId;
        }

        $vote->save();

        return $vote;
    }

}
