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
}
