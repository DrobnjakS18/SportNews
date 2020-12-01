<?php


namespace App\Services;


use App\Libraries\StorageManager;
use App\Mail\NewPostEmail;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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
    public static function getAll()
    {
       return PostRepository::all();
    }

    public static function getByStatus($status)
    {
        return PostRepository::findByStatus($status);
    }

    static public function verify($id, $status)
    {
        $post = PostRepository::verify($id, $status);

        return set_ajax_reponse_object($post->status, self::STATUS_CODE_OK, null, 'Post ' . $post->status . '!');
    }

    static public function select($id, $select)
    {
        $post = PostRepository::select($id, $select);

        return set_ajax_reponse_object($post->select, self::STATUS_CODE_OK, null, 'Post ' . $post->select . '!');
    }

    /**
     * Gets all editors picked posts
     * @param $selected
     * @return object
     */
    static public function getSelectedPost($selected)
    {
        return PostRepository::findBySelectedPost($selected);
    }

    /**
     * Gets all posts with users
     * @return object
     */
    public static function getAllWithUsers()
    {
        $data['posts'] = self::getByStatus('verified');
        $data['users'] = UserService::getAll();
        $data['top_authors'] = UserService::getTopUsers('author',6);
        $data['tennis'] = PostRepository::findByCategory(3);
        $data['esports'] = PostRepository::findByCategory(4);
        $data['basketball'] = PostRepository::findByCategory(2);
        $data['football'] = PostRepository::findByCategory(1);
        $data['selected'] = self::getSelectedPost('selected');
        $data['editorPickCounter'] = ceil($data['selected']->count() /2);

        return (object) $data;
    }

    /**
     * Get posts and users by category name
     * @param $name
     * @return object
     */
    public static function getByCategoryName($name)
    {
        $categoryId = CategoryService::getByName(strtolower($name));


        $data['posts'] = PostRepository::findByCategory($categoryId);
        $data['users'] = UserService::getAll();
        $data['top_authors'] = UserService::getTopUsers('author',4);


        return (object) $data;
    }


    /**
     * Get post id
     * @param $id
     * @return \App\Repositories\PostRepository
     */
    public static function getById($id)
    {
        return PostRepository::findById($id);
    }

    /**
     * Get post slug
     * @param $category_id
     * @param $slug
     * @return PostRepository
     */
    public static function getBySlug($slug)
    {
        return PostRepository::findBySlug($slug);
    }

    /**
     * Get post slug id and categories
     * @param $category_id
     * @param $slug
     * @return PostRepository
     */
    public static function getBySlugWithCategories($category_id,$slug)
    {
        return PostRepository::findBySlugAndCategory($category_id,$slug);
    }

    /**
     * Get post by users id paginated
     * @param $id
     * @return \App\Repositories\PostRepository
     */
    public static function getByUser($id)
    {
        return PostRepository::findByUser($id);
    }

    /**
     * Get previous post of the current sent post id
     * @param $id
     * @return \App\Repositories\PostRepository
     */
    public static function getPreviousPost($id)
    {
        $previousId = PostRepository::findPreviousPost($id);

        return PostRepository::findById($previousId);
    }

    /**
     * Get next post of the current sent post id
     * @param $id
     * @return \App\Repositories\PostRepository
     */
    public static function getNextPost($id)
    {
        $nextId = PostRepository::findNextPost($id);

        return  PostRepository::findById($nextId);
    }

    /**
     * Increment post view by 1
     * @param $post
     * @return mixed
     */
    public static function incrementViews($post)
    {
        return $post->increment('views',1);
    }

    /**
     * Get all data for single page post
     * @param $category
     * @param $slug
     * @return object
     */
    public static function getAllAboutPost($category,$slug)
    {

        $categoryLowerCase = lcfirst($category);
        $category_id = CategoryService::getByName($categoryLowerCase);
        $data['post'] = self::getBySlugWithCategories($category_id, $slug);

        //Samo neautorizovani korisnici i autori drugih clanaka mogu da povecaju count view
        if(Auth::user() == null || !Auth::user()->posts->contains('id',$data['post']->id)) {
            self::incrementViews($data['post']);
        }

        $data['previous'] = self::getPreviousPost($data['post']->id);
        $data['next'] = self::getNextPost($data['post']->id);
        $data['posts'] = self::getAll();
        $data['comments'] = $data['post']->comments->where('comment_id','=',null)->where( 'status','verified');

        session()->put('post_id',$data['post']->id);

        return (object) $data;
    }


    /**
     * Search post by title
     * @param $search
     * @return \App\Models\Post | \Illuminate\Database\Eloquent\Collection
     */
    public static function getPostBySearch($search)
    {
        return PostRepository::searchPost($search);
    }

    /**
     * Store uploaded file in public/storage/images
     * @param $file
     * @return string
     */
    public static function storeUploadedImage($file)
    {
        //Get filename with extension
        $fileName = $file->getClientOriginalName();

        $filePath = StorageManager::putToFile('images', $file,$fileName);

        $url = StorageManager::getUrl($filePath);

        return  (object) [
            'url' => $url
        ];
    }

    /**
     * Set sent data into array referencing Post table columns
     * @param $title
     * @param $file
     * @param $category
     * @param $content
     * @param $shortText
     * @return array
     */
    public static function setData($title, $url,$category, $content, $shortText)
    {
        return [
            'title' => $title,
            'slug' => Str::slug($title,'-'),
            'content' => $content,
            'short_text' => $shortText,
            'picture' => $url,
            'user_id' => Auth::user()->id,
            'category_id' => CategoryService::getByName($category)
        ];

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
    public static function store($title,$file,$category,$content,$tags = null)
    {
        DB::beginTransaction();

        try {

            $stripContent = strip_tags($content);
            $shortText = substr($stripContent,0,100)."...";

            $postArray = self::setData($title,$file,$category,$content,$shortText);

            $post = PostRepository::create($postArray);

            ($tags !== null) ? $tagArray = explode(',',$tags) : $tagArray = null;

            if ($tags !== null) {
                TagService::storeObjectTags($post,$tags);
            }

            DB::commit();
        } catch (\Exception $exception) {

            DB::rollback();
            return set_ajax_reponse_object(self::STATUS_EROR, self::STATUS_CODE_ERROR, null, $exception->getMessage());
        }

        $postLink = route('post',['category' => ucfirst($post->category->name), 'slug' => $post->slug]);

        Mail::to('drobnjak.stefan18@gmail.com')->send(new NewPostEmail($title, Auth::user()->name, $category, $postArray['picture'] ,  $postArray['short_text'], $postLink));

       return set_ajax_reponse_object(self::STATUS_SUCCESS, self::STATUS_CODE_OK, $postLink, null);
    }

    /**
     * Update post
     * @param $path
     * @param $file
     * @param null $id
     * @return object
     */
    public static function update($id,$title,$url,$category,$content,$tags)
    {
        DB::beginTransaction();

        try {
            $stripContent = strip_tags($content);
            $shortText = substr($stripContent,0,100)."...";

            $postArray = self::setData($title,$url,$category,$content,$shortText);

            //Treba videli da li kada korisnik izmeni svoj article da se status vrati na unverified
            $post = PostRepository::update($id,$postArray);

            ($tags !== null) ? $tagArray = explode(',',$tags) : $tagArray = null;

            if ($tags !== null) {
                TagService::storeObjectTags($post,$tags);
            }

            DB::commit();
        } catch(\Exception $exception) {
            DB::rollback();
            return set_ajax_reponse_object(self::STATUS_EROR, self::STATUS_CODE_ERROR, null, $exception->getMessage());
        }

        $postLink = route('post',['category' => ucfirst($post->category->name), 'slug' => $post->slug]);

        Mail::to('drobnjak.stefan18@gmail.com')->send(new NewPostEmail($title, Auth::user()->name, $category, $postArray['picture'] ,  $postArray['short_text'], $postLink));

        return set_ajax_reponse_object(self::STATUS_SUCCESS, self::STATUS_CODE_OK, $postLink, null);
    }


    /**
     * Store text editor upload image
     * @param $path
     * @param $file
     * @param null $id
     * @return object
     */
    public static function uploadImage($path,$file,$id = null)
    {
        //Get filename with extension
        $fileName = $file->getClientOriginalName();

        $filePath = StorageManager::putToFile($path, $file, $fileName);

        $url = StorageManager::getUrl($filePath);

        if($path === "profile/images")
        {
            UserService::updateProfileImage($id,$url);
        }

        return  (object) [
            'url' => $url
        ];
    }

    static public function delete($id)
    {
        return PostRepository::delete($id);
    }

    static public function authorDelete($slug,$id)
    {
        $author = UserService::getBySlug($slug);


        return PostRepository::authorDelete($author->id,$id);
    }

}
