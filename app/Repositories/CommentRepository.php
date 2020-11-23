<?php


namespace App\Repositories;


use App\Models\Comment;

class CommentRepository extends BaseRepository
{
    const STATUS_VERIFIED = 'verified';
    const STATUS_UNVERIFIED = 'unverified';


    public function __construct()
    {
        $this->className = 'App\Models\Comment';
    }

    public static function getAll()
    {
        return Comment::all();
    }

    /**
     * Find comment by Id
     */
    public static function findById($id)
    {
        return Comment::find($id);
    }

    public static function findByStatus($status)
    {
        return Comment::where('status',$status)->get();
    }

    static public function verify($id, $status)
    {
        $comment = Comment::findOrFail($id);

        $comment->status = ($status != self::STATUS_VERIFIED) ? self::STATUS_VERIFIED : self::STATUS_UNVERIFIED;

        $comment->save();

        return $comment;
    }
    /**
     * Find all comments by post pagenate per page 10
     * @param $id
     * @return Comment
     */
    public static function allCommentsByPost($id)
    {
        return Comment::with(['user','likes','post'])->wherePost_idAndComment_id($id,null)->latest()->simplePaginate(10);
    }

    /**
     * Find all comments by post pagenate per page 10
     * @param $postId
     * @param $sortBy
     * @return Comment
     */
    public static function sortedComments($postId,$sortBy)
    {
        return Comment::wherePost_idAndComment_id($postId,null)->orderBy($sortBy,'DESC')->simplePaginate(10);
    }

    /**
     * Store comment
     * @param $message
     * @return Comment
     */
    public static function create($message,$post,$user,$comment_id = null)
    {
        $comment = new Comment();

//        dd($comment_id);

        if (isset($message)) {
           $comment->text = $message;
        }

        if (isset($post)) {
           $comment->post_id = $post;
        }

        if (isset($user)) {
            $comment->user_id = $user;
        }

        if(isset($comment_id)) {
            $comment->comment_id = $comment_id;
        }

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
    public static function updateVotes($commentId,$likes,$dislikes)
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


    static public function delete($id)
    {
        return Comment::destroy($id);
    }

}
