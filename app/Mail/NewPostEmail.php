<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostEmail extends Mailable
{

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
    public function __construct($title, $autor, $category, $picture,$shortText,$link)
    {
        $this->title = $title;
        $this->autor = $autor;
        $this->category = $category;
        $this->picture = $picture;
        $this->shortText = $shortText;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->view('emails.postTemplate')
            ->subject('New post has been publish - Sport News')
            ->with([
                'title' => $this->title,
                'autor' => $this->autor,
                'category' =>  $this->category,
                'picture' => $this->picture,
                'shortText' =>  $this->shortText,
                'link' =>  $this->link
            ]);
    }
}
