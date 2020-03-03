<?php


namespace App\Services;


use App\Repositories\CommentRepository;

class CommentService
{
    /**
     * Store comment
     * @param $message
     * @param $post
     * @param $user
     * @param $recaptcha
     * @param null $comment_id
     * @return object
     */
    static public function store($message,$post,$user,$recaptcha,$comment_id = null)
    {
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe&response=".$recaptcha);

        if ($response) {
            CommentRepository::create($message,$post,$user,$comment_id);

            return (object) [
                'code' => 200,
                'message' => 'Your message has been successfully sent'
            ];
        } else {
            return (object) [
                'code' => 422,
            ];
        }
    }

    /**
     * Get all comments by post slug
     * @param $slug
     * @return object
     */
    static public function getCommentsByPost($slug)
    {
        $post = PostService::getBySlug($slug);

        $comments = CommentRepository::allCommentsByPost($post->id);
        return (object) [
            'post' => $post,
            'comments' => $comments
        ];

    }
}
