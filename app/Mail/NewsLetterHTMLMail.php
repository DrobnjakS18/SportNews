<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsLetterHTMLMail extends Mailable
{
    const EMAIL_SUBJECT = 'New post has been publish - Sport News';

    use Queueable, SerializesModels;

    /**
     * The answer instance.
     *
     * @var Post
     */
    public $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(self::EMAIL_SUBJECT)->view('emails.post');
    }
}
