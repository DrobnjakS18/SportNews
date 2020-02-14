<?php


namespace App\Repositories;


use App\Models\Tag;

class TagRepository extends BaseRepository
{
    public function __construct()
    {
        $this->className = 'App\Models\Tag';
    }

    /**
     * Insert new tag
     * @param $tag
     * @return Tag
     */
    static public function create($tag)
    {
        $tags = new Tag();

        if (isset($tag)) {
           $tags->name = $tag;
        }

        $tags->save();

        return $tags;
    }

    /**
     * Find tag by name
     * @param $name
     * @return Tag
     */
    static public function findByName($name)
    {
        return Tag::where('name',$name)->first();
    }

    /**
     * Find tag by name if exists
     * @param $name
     * @return boolean
     */
    static public function findIfExists($name)
    {
        return Tag::where('name',$name)->exists();
    }



}
