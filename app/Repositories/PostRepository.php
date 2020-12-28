<?php


namespace App\Repositories;


use App\Models\Post;

class PostRepository extends BaseRepository
{

    const STATUS_VERIFIED = 'verified';
    const STATUS_UNVERIFIED = 'unverified';

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

    public static function findByStatus($status)
    {
        return Post::where('status',$status)->get();
    }

    public static function findBySelectedPost($selected)
    {
        return Post::where('select',$selected)->where('status','verified')->get();
    }

    /**
     * Find post by Id
     */
    public static function findById($id)
    {
        return Post::find($id);
    }

    /**
     * Find post by author name and post id
     */
    public static function findByAuthorAndId($authorId,$id)
    {
        return Post::where('user_id',$authorId)->find($id);
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
        return Post::where('category_id',$id)->where('status','verified')->orderBy('created_at','DESC')->simplePaginate(4) ;
    }

    /**
     * Find post by user id pagination 4
     * @param $id
     * @return
     */
    public static function findByUser($id)
    {
        return Post::where('user_id',$id)->where('status','verified')->orderBy('created_at','DESC')->simplePaginate(4);
    }

    /**
     * Find post by user id pagination  all posts
     * @param $id
     * @return
     */
    public static function findByUserIdAll($id)
    {
        return Post::where('user_id',$id)->orderBy('created_at','DESC')->simplePaginate(4);
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
     * @param $data
     * @return Post
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
     * Update post
     * @param $data
     * @return Post
     */
    static public function update($id, $data)
    {
        $post = self::findById($id);

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

        //Kad se updatuje clanak, mora opet da prodje kroz verifikaciju
        $post->status = 'unverified';

        $post->save();

        return $post;
    }


    static public function verify($id, $status)
    {
        $post = Post::findOrFail($id);

        $post->status = ($status != self::STATUS_VERIFIED) ? self::STATUS_VERIFIED : self::STATUS_UNVERIFIED;

        $post->save();

        return $post;
    }

    static public function select($id, $select)
    {
        $post = Post::findOrFail($id);

        $post->select = ($select != 'selected') ? 'selected' : 'unselected';

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

    static public function delete($id)
    {
        $post = self::findById($id);

        if($post->tags()->count()) {
            $post->tags()->detach();
        }

        return $post->delete();
    }

    static public function authorDelete($authorId,$id)
    {

        $post = self::findByAuthorAndId($authorId,$id);

        if($post->tags()->count()) {
            $post->tags()->detach();
        }

        return $post->delete();
    }


}
