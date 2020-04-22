<?php


namespace App\Services;


use App\Repositories\PostTagRepository;

class PostTagService
{
    /**
     * Store post_id and tag_id into pivot table
     */
    public static function store($post_id,$tag_id)
    {
        return PostTagRepository::create($post_id,$tag_id);
    }

    public static function getByTagId($id)
    {
        return PostTagRepository::findByTag($id);
    }
}
