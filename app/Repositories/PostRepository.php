<?php


namespace App\Repositories;


use App\Models\Post;

class PostRepository extends BaseRepository
{
    public function __construct()
    {
        $this->className = 'App\Models\Post';
    }


    /**
     * All posts joined with category table
     */
    static public function allWithCategory()
    {
        return Post::with('category')->get();
    }

    /**
     * Single post by Id
     */
    static public function findById($id)
    {
        return Post::find($id);
    }



}
