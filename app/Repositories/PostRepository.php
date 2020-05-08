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
    public static function all()
    {
        return Post::withCount(['user','category'])->get();
    }

    /**
     * Single post by Id
     */
    public static function findById($id)
    {
        return Post::find($id);
    }

    public static function findBySlug($slug)
    {
        return Post::where('slug',$slug)->firstOrFail();
    }

    /**
     * Single post by slug
     * @param $category_id
     * @param $slug
     * @return
     */
    public static function findBySlugAndCategory($category_id,$slug)
    {
        return Post::withCount('comments')->whereCategory_idAndSlug($category_id,$slug)->firstOrFail();
    }

    /**
     * Find previous post by current id parameter sent
     * @param $currentPostId
     * @return
     */
    public static function findPreviousPost($currentPostId)
    {
        return Post::where('id','<',$currentPostId)->max('id');
    }


    /**
     * Find next post by current id parameter sent
     * @param $currentPostId
     * @return
     */
    public static function findNextPost($currentPostId)
    {
        return Post::where('id','>',$currentPostId)->min('id');
    }

    /**
     * Single post by category pagination 4
     * @param $id
     * @return
     */
    public static function findByCategory($id)
    {
        return Post::where('category_id',$id)->simplePaginate(4) ;
    }

    /**
     * Find post by user id pagination 4
     * @param $id
     * @return
     */
    public static function findByUser($id)
    {
        return Post::where('user_id',$id)->simplePaginate(4);
    }

    /**
     * Search post by title
     * @param $search
     * @return Post
     */
    public static function searchPost($search)
    {
        return Post::where('title','like','%'.$search."%")->simplePaginate(9);
    }

    /**
     * Insert new post
     */
    public static function create($data){

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

        if (isset($data['short_text'])) {
            $post->short_text = $data['short_text'];
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
    public static function insertImage($image)
    {
        $post = new Post();

        if (isset($image)) {
           $post->picture = $image;
        }

        $post->save();

        return $post;

    }


}
