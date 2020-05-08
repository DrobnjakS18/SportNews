<?php


namespace App\Services;


use App\Repositories\PostTagRepository;

class PostTagService
{
    public static function getByTagId($id)
    {
        return PostTagRepository::findByTag($id);
    }
}
