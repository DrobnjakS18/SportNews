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
     * All posts
     */
    static public function all()
    {
        return Post::all();
    }

    /**
     * Single post by Id
     */
    static public function findById($id)
    {
        return Post::find($id);
    }

    /**
     * Single post by category
     */
    static public function findByCategory($id)
    {
        return Post::where('category_id',$id)->simplePaginate(4) ;
    }

    /**
     * Find post by user id
     */
    static public function findByUser($id)
    {
        return Post::where('user_id',$id)->simplePaginate(4);
    }

    /**
     * Find previous post by current id parameter sent
     */
    static public function findPreviousPost($currentPostId)
    {
        return Post::where('id','<',$currentPostId)->max('id');
    }

    /**
     * Find next post by current id parameter sent
     */
    static public function findNextPost($currentPostId)
    {
        return Post::where('id','>',$currentPostId)->min('id');
    }


    /**
     * Insert new post
     */
    static public function create($data){

        $post = new Post();

        if (isset($data['title'])) {
            $post->title = $data['title'];
        }

        if (isset($data['slug'])) {
            $post->slug = $data['slug'];
        }


        if (isset($data['content'])) {
            $post->content = $data['content'];
        }


        if (isset($data['picture'])) {
            $post->picture = $data['picture'];
        }


        if (isset($data['select'])) {
            $post->select = $data['select'];
        }

        if (isset($data['user_id'])) {
            $post->user_id = $data['user_id'];
        }

        if (isset($data['category_id'])) {
            $post->category_id = $data['category_id'];
        }

        $post->save();

        return $post;

    }

    /**
     * Insert new image name into database
     */
    static public function insertImage($image)
    {
        $post = new Post();

        if (isset($image)) {
           $post->picture = $image;
        }

        $post->save();

        return $post;

    }


}
