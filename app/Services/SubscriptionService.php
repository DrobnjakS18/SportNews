<?php


namespace App\Services;

use App\Repositories\SubscriptionRepository;

class SubscriptionService
{
    public static function store($email)
    {
        SubscriptionRepository::create($email);
    }
}
