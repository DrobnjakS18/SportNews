<?php


namespace App\Services;


use App\Repositories\TagRepository;

class TagService
{
    /**
     * Store new tag
     * @param $tag
     * @return \App\Models\Tag
     */
    static public function store($tag)
    {
        return TagRepository::create($tag);
    }

    /**
     * Find tag by name if exists
     * @param $name
     * @return bool
     */
    static public function getIfExists($name)
    {
        return TagRepository::findIfExists($name);
    }

    /**
     * Find tag by name
     * @param $name
     * @return App\Models\Tag
     */
    static public function getByName($name)
    {
        return TagRepository::findByName($name);
    }

}
