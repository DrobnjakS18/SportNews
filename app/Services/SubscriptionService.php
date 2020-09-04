<?php


namespace App\Services;

use App\Repositories\SubscriptionRepository;
use Newsletter;

class SubscriptionService
{
    public static function subscribe($email)
    {
//        SubscriptionRepository::create($email);

        if ( ! Newsletter::isSubscribed($email) ) {
            Newsletter::subscribePending($email);

            return (object) [
                'type' => 'success',
                'message' => 'Almost finished... We need to confirm your email address. To complete the subscription process, please click the link in the email we just sent you.'
            ];
        } else {
            return (object) [
                'type' => 'fail',
                'message' => 'You have already subscribed'
            ];
        }
    }

    public static function email($surname,$email,$subject,$message)
    {


    }
}
