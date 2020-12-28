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

        return $posts;
    }

    public static function storeObjectTags($object, $tags)
    {
        $tagsArray = explode(',', $tags);

        for ($i = 0; $i < count($tagsArray); $i++) {
            $findTag = self::getByName($tagsArray[$i]);

            if($findTag->name) {
                $object->tags()->attach($findTag->id);
            } else {
                $tag = TagRepository::create($tagsArray[$i]);
                $object->tags()->attach($tag->id);
            }

        }
    }

}
