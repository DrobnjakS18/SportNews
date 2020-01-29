<?php


namespace App\Services;

use App\Repositories\SubscriptionRepository;

class SubscriptionService
{
    static public function store($email)
    {
        SubscriptionRepository::create($email);
    }
}
