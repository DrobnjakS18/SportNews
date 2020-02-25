<?php


namespace App\Services;


use App\Repositories\CommentRepository;

class CommentService
{
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
}
