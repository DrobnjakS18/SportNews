<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($surname, $email, $subject, $message)
    {
        $this->surname =  $surname;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
            ->replyTo($this->email,$this->surname)
            ->view('emails.postTemplate')
            ->subject('New message:'. $this->subject())
            ->with([
                'surname' => $this->surname,
                'email' => $this->email,
                'messageText' => $this->message,
            ]);
    }
}
