<?php


namespace App\Services;


use App\Repositories\TagRepository;

class TagService
{
    /**
     * Store new tag
     */
    static public function store($tag)
    {
        return TagRepository::create($tag);
    }

    /**
     * Find tag by name if exists
     */
    static public function getIfExists($name)
    {
        return TagRepository::findIfExists($name);
    }

    /**
     * Find tag by name
     */
    static public function getByName($name)
    {
        return TagRepository::findByName($name);
    }

    /**
     * Get All posts by tag via pivot table post_tag
     */
    static public function getAllPostsByTag($tag)
    {
        $tag = self::getByName($tag);

        $posts = PostTagService::getByTagId($tag->id);

//        dd($posts);

        return $posts;
    }

}
