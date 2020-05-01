<?php


namespace App\Repositories;


use App\Models\Comment;

class CommentRepository extends BaseRepository
{
    public function __construct()
    {
        $this->className = 'App\Models\Comment';
    }

    /**
     * Find all comments by post pagenate per page 10
     * @param $id
     * @return Comment
     */
    static public function allCommentsByPost($id)
    {
        return Comment::wherePost_idAndComment_id($id,null)->latest()->simplePaginate(10);
    }

    /**
     * Find all comments by post pagenate per page 10
     * @param $postId
     * @param $sortBy
     * @return Comment
     */
    static public function sortedComments($postId,$sortBy)
    {
        return Comment::wherePost_idAndComment_id($postId,null)->orderBy($sortBy,'DESC')->simplePaginate(10);
    }

    /**
     * Store comment
     * @param $message
     * @return Comment
     */
    static public function create($message,$post,$user,$comment_id = null)
    {
        $comment = new Comment();

        if (isset($message)) {
           $comment->text = $message;
        }

        if (isset($post)) {
           $comment->post_id = $post;
        }

        if (isset($user)) {
            $comment->user_id = $user;
        }

        $comment->comment_id = $comment_id;


        $comment->save();

        return $comment;
    }

    /**
     * Update votes
     * @param $commentId
     * @param $likes
     * @param $dislikes
     * @return Comment
     */
    static public function updateVotes($commentId,$likes,$dislikes)
    {
        $comment = Comment::find($commentId);

        if (isset($likes)) {
           $comment->like = $likes;
        }

        if (isset($dislikes)) {
            $comment->dislike = $dislikes;
        }

        $comment->save();

        return  $comment;
    }

}
