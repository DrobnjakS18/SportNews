<?php


namespace App\Services;


use App\Repositories\CommentRepository;

class CommentService
{
    const STATUS_SUCCESS = 'success';
    const STATUS_CODE_OK = 200;

    const STATUS_EROR = "error";
    const STATUS_CODE_ERROR = 500;

    /**
     * Set sent data into array referencing Comments table columns
     * @param $data
     * @param $view
     * @return array
     */
    public static function setData($data, $view)
    {
        return [
            'data' => $data,
            'view' => $view,
            'all' => CommentRepository::getAll()
        ];
    }

    public static function getAllComments()
    {

        $data = CommentRepository::getAll();
        $lastPage = extract_last_from_url(url()->current());

        switch ($lastPage) {
            case 'comments':
                return self::setData($data,'admin.pages.comments');
                break;
            case 'answers':
                return self::setData($data,'admin.pages.answers');
                break;
            default:
                return CommentRepository::getAll();
                break;
        }
    }

    public static function getByStatus($status)
    {
        $data = CommentRepository::findByStatus($status);
        $lastPage = extract_last_from_url(url()->current(),'prev');


        switch ($lastPage) {
            case 'comments':
                return self::setData($data,'admin.pages.comments');
                break;
            case 'answers':
                return self::setData($data,'admin.pages.answers');
                break;
            default:
                return CommentRepository::findByStatus($status);
                break;
        }

    }

    static public function verify($id, $status)
    {
        $post = CommentRepository::verify($id, $status);

        $lastPage = extract_last_from_url(url()->current(),'prev');

        return set_ajax_reponse_object($post->status, self::STATUS_CODE_OK, null, 'Comment ' . $post->status . '!');
    }

    /**
     * Store comment
     * @param $message
     * @param $post
     * @param $user
     * @param $recaptcha
     * @param null $comment_id
     * @return object
     */
    public static function store($message,$post,$user,$recaptcha,$comment_id = null)
    {
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" .config('app.CAPTCHA_SECRET') ."&response=".$recaptcha);

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
    public static function getCommentsByPost($slug)
    {
        $post = PostService::getBySlug($slug);

        $comments = CommentRepository::allCommentsByPost($post->id);

        return (object) [
            'post' => $post,
            'comments' => $comments
        ];

    }

    /**
     * Update comment likes and dislikes
     * @param $commentId
     * @param $likes
     * @param $dislikes
     * @return object
     */
    public static function updateCommentVotes($commentId,$likes,$dislikes)
    {
        return CommentRepository::updateVotes($commentId,$likes,$dislikes);
    }

    /**
     * Get all sorted comments by post slug
     * Updated 1.5.2020 Obrisan case newest kao visak
     * @param $slug
     * @return object
     */
    public static function getSortedComments($slug,$type)
    {
        $post = PostService::getBySlug($slug);

            switch ($type) {
                case 'liked':
                    $comments = CommentRepository::sortedComments($post->id,'like');
                    break;
                case 'disliked':
                    $comments = CommentRepository::sortedComments($post->id,'dislike');
                    break;
                default:
                    $comments = CommentRepository::sortedComments($post->id,'created_at');
                    break;
            }

            return (object) [
                'post' => $post,
                'comments' => $comments
            ];

    }

    static public function delete($id)
    {
        return CommentRepository::delete($id);
    }
}
