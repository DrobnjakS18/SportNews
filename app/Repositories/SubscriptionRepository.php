<?php


namespace App\Repositories;


use App\Models\Subscription;

class SubscriptionRepository extends BaseRepository
{

    public function __construct()
    {
        $this->className = 'App\Models\Subscription';
    }

    static public function create($email)
    {
        $newsLetter = new Subscription();

        if (isset($email)) {
            $newsLetter->email = $email;
        }

        $newsLetter->save();

        return $newsLetter;
    }
}
