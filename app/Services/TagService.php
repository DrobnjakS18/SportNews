<?php


namespace App\Services;


use App\Repositories\TagRepository;

class TagService
{
    /**
     * Store new tag
     */
    public static function store($tag)
    {
        return TagRepository::create($tag);
    }

    /**
     * Find tag by name if exists
     */
    public static function getIfExists($name)
    {
        return TagRepository::findIfExists($name);
    }

    /**
     * Find tag by name
     */
    public static function getByName($name)
    {
        return TagRepository::findByName($name);
    }

    /**
     * Get All posts by tag via pivot table post_tag
     */
    public static function getAllPostsByTag($tag)
    {
        $tag = self::getByName($tag);

        $posts = PostTagService::getByTagId($tag->id);

//        dd($posts);

        return $posts;
    }

}
