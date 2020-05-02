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
     * Store forgein keys into pivot table
     * @param $post_id
     * @param $tag_id
     * @return PostTag
     */
    public static function create($post_id,$tag_id)
    {
        $postTag = new PostTag();

        if (isset($post_id)) {
           $postTag->post_id = $post_id;
        }

        if (isset($tag_id)) {
            $postTag->tag_id = $tag_id;
        }

        $postTag->save();

        return $postTag;

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
