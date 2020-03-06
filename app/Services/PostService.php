<?php


namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Collection;

class PostService
{
    const STATUS_SUCCESS = 'success';
    const STATUS_CODE_OK = 200;

    const STATUS_EROR = "error";
    const STATUS_CODE_ERROR = 500;

    /**
     * Gets all posts
     * @return \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function getAll()
    {
       return PostRepository::all();
    }

    /**
     * Gets all posts with users
     * @return object
     */
    static public function getAllWithUsers()
    {
        $data['posts'] = PostRepository::all();
        $data['users'] = UserService::getAll();

        return (object) $data;
    }

    /**
     * Set sent data into array referencing Post table columns
     * @param $title
     * @param $file
     * @param $category
     * @param $content
     * @return array
     */
    static public function setData($title, $file,$category, $content)
    {
        return [
            'title' => $title,
            'slug' => Str::slug($title,'-'),
            'content' => $content,
            'picture' => $file,
            'select' => '0',
            'user_id' => Auth::user()->id,
            'category_id' => CategoryService::getByName($category)
        ];

    }

    /**
     * Get post id
     * @param $id
     * @return \App\Repositories\PostRepository
     */
    static public function getById($id)
    {
        return PostRepository::findById($id);
    }

    /**
     * Get post slug id
     * @param $slug
     * @return PostRepository
     */
    static public function getBySlug($slug)
    {
        return PostRepository::findBySlug($slug);
    }

    /**
     * Get post by users id
     * @param $id
     * @return \App\Repositories\PostRepository
     */
    static public function getByUser($id)
    {
        return PostRepository::findByUser($id);
    }

    /**
     * Get previous post of the current sent post id
     * @param $id
     * @return \App\Repositories\PostRepository
     */
    static public function getPreviousPost($id)
    {
        $previousId = PostRepository::findPreviousPost($id);

        return PostRepository::findById($previousId);
    }

    /**
     * Get next post of the current sent post id
     * @param $id
     * @return \App\Repositories\PostRepository
     */
    static public function getNextPost($id)
    {
        $nextId = PostRepository::findNextPost($id);

        return  PostRepository::findById($nextId);
    }

    /**
     * Increment post view by 1
     * @param $post
     * @return mixed
     */
    static public function incrementViews($post)
    {
       return $post->increment('views',1);
    }

    /**
     * Get all data for single page post
     * @param $slug
     * @return object
     */
    static public function getAllAboutSinglePost($slug)
    {

        $data['post'] = self::getBySlug($slug);
        $data['views'] = self::incrementViews($data['post']);
        $data['posts'] = self::getAll();
        $data['previous'] = self::getPreviousPost($data['post']->id);
        $data['next'] = self::getNextPost($data['post']->id);
        $data['comments'] = $data['post']->comments->where('comment_id','=',null);

        session()->put('post_id',$data['post']->id);

        return (object) $data;
    }

    /**
     * Get posts and users by category name
     * @param $name
     * @return object
     */
    static public function getByCategoryName($name)
    {
        $categoryId = CategoryService::getByName(strtolower($name));

        $data['posts'] = PostRepository::findByCategory($categoryId);
        $data['users'] = UserService::getAll();

        return (object) $data;
    }


    /**
     * Search post by title
     * @param $search
     * @return \App\Models\Post | \Illuminate\Database\Eloquent\Collection
     */
    static public function getPostBySearch($search)
    {
        return PostRepository::searchPost($search);
    }

    /**
     * Store uploaded file in public/storage/images
     * @param $file
     * @return string
     */
    static public function storeUploadedImage($file)
    {
        //Get filename with extension
        $fileNameWithExtension = $file->getClientOriginalName();
        //Get only filename
        $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
        //Get only extension
        $extension = $file->getClientOriginalExtension();
        //Get filename to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        //Storage image
        $file->storeAs('public/images',$fileNameToStore);

        return $fileNameToStore;
    }

    /**
     * Store new post
     * @param $title
     * @param $file
     * @param $category
     * @param $content
     * @param null $tags
     * @return object
     */
    static public function store($title,$file,$category,$content,$tags = null)
    {
        DB::beginTransaction();

        try {
            $uploadedFile = self::storeUploadedImage($file);

            $post = self::setData($title,$uploadedFile,$category,$content);

            $postId = PostRepository::create($post);

            ($tags !== null) ? $tagArray = explode(',',$tags) : $tagArray = null;

            if ($tagArray !== null) {

                foreach ($tagArray as $tag) {
                    $tagExists = TagService::getIfExists($tag);

                    ($tagExists) ? $tagId = TagService::getByName($tag) : $tagId = TagService::store($tag);

                    PostTagService::store($postId->id,$tagId->id);
                }
            }
            DB::commit();
        } catch (\Exception $exception) {

            DB::rollback();
            return set_ajax_reponse_object(self::STATUS_EROR, self::STATUS_CODE_ERROR, null, $exception->getMessage());
        }

       return set_ajax_reponse_object(self::STATUS_SUCCESS, self::STATUS_CODE_OK, route('home'), null);
    }

    /**
     * Store text editor upload image
     * @param $file
     * @return object
     */
    static public function uploadImage($file)
    {
        $uploadedFile = self::storeUploadedImage($file);

        return (object) [
            'status' => 200,
            'image_name' => asset('storage/images/'.$uploadedFile)
        ];

    }

}
