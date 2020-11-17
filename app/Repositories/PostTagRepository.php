<?php


namespace App\Repositories;


use App\Models\Post;
use App\Models\PostTag;

class PostTagRepository extends BaseRepository
{

    public function __construct()
    {
        $this->className = 'App\Models\Post';
    }


    /**
     * Finds all by tag id
     * @param $id
     * @return PostTag
     */
    public static function findByTag($id)
    {
        return PostTag::where('tag_id',$id)->get();
    }


}
