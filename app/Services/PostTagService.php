<?php


namespace App\Services;


use App\Repositories\PostTagRepository;

class PostTagService
{
    /**
     * Store post_id and tag_id into pivot table
     */
    static public function store($post_id,$tag_id)
    {
        return PostTagRepository::create($post_id,$tag_id);
    }

    static public function getByTagId($id)
    {
        return PostTagRepository::findByTag($id);
    }
}
