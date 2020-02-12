<?php


namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostService
{
    const STATUS_SUCCESS = 'success';
    const STATUS_CODE_OK = 200;

    const STATUS_EROR = "error";
    const STATUS_CODE_ERROR = 500;


    static public function getAll()
    {
       return PostRepository::all();
    }
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

    static public function getById($id)
    {
        return PostRepository::findById($id);
    }

    static public function getByUser($id)
    {
        return PostRepository::findByUser($id);
    }

    static public function getPreviousPost($id)
    {
        $previousId = PostRepository::findPreviousPost($id);

        return PostRepository::findById($previousId);
    }

    static public function getNextPost($id)
    {
        $nextId = PostRepository::findNextPost($id);

        return  PostRepository::findById($nextId);
    }

    static public function getAllAboutSinglePost($slug)
    {

        $id = extract_id_from_slug($slug);

        $data['post'] = self::getById($id);
        $data['posts'] = self::getAll();
        $data['previous'] = self::getPreviousPost($id);
        $data['next'] = self::getNextPost($id);

        return (object) $data;
    }

    static public function getByCategoryName($name)
    {
        $categoryId = CategoryService::getByName($name);

        $data['posts'] = PostRepository::findByCategory($categoryId);
        $data['users'] = UserService::getAll();

        return (object) $data;
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

            $tagArray = explode(',',$tags);

            if (!empty($tagArray)) {

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
     * Display selected image in text editor via ajax
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
