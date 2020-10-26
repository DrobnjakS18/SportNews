<?php


namespace App\Services;


use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Str;
use Exception;


class UserService
{
    const STATUS_FAILED = 'failed';
    const STATUS_SUCCESS = 'success';

    const LOGIN_FAILED_MESSAGE = 'Invalid credentials!';

    const STATUS_CODE_OK = 200;
    const STATUS_CODE_FAILED = 403;


    static public function setData($username, $url, $email, $password, $role_id)
    {
        return [
            'username' => $username,
            'slug' => Str::slug($username,'-'),
            'url' => $url,
            'email' => $email,
            'password' => $password,
            'role' => intval($role_id),
            'email_verified_at' => date("Y-m-d H:m:i",time())
        ];
    }

    /**
     * Get all users
     * @return \App\Models\User[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return UserRepository::all();
    }


    /**
     * Get user by id
     * @return string
     */
    public static function getById($id)
    {
        return UserRepository::findById($id);
    }

    /**
     * Get user by name
     * @param $slug
     * @return string
     */
    public static function getBySlug($slug)
    {
        return UserRepository::findBySlug($slug);
    }


    public static function getTopUsers($role,$number)
    {
        $users =  UserRepository::topUsers($role,$number);

        if($role === 'author') {
           $users =  $users->sortByDesc('post_count');
        }

        return $users;
    }

    /**
     * Get user by role
     * @param $id
     * @return string
     */
    public static function getByRole($id)
    {
        return UserRepository::findByRole($id);
    }

    /**
     * Get multiple users paginated
     * @param $name
     * @return object
     */
    public static function getByNamePostsPaginate($name)
    {
        $data['users'] = UserRepository::all();
        $data['user'] = self::getBySlug($name);
        $data['posts'] = PostService::getByUser($data['user']->id);
        $data['top_authors'] = UserService::getTopUsers('author',4);

        return (object)$data;
    }


    /**
     * Store new user
     * @param $username
     * @param $url
     * @param $email
     * @param $password
     * @param $role
     * @return object
     */
    public static function store($username, $url, $email, $password, $role)
    {
        $data = self::setData($username, $url, $email, $password, $role);

        UserRepository::create($data);

        return set_ajax_reponse_object(self::STATUS_SUCCESS, self::STATUS_CODE_OK, route('users.users'), null);
    }


    /**
     * Upload image local
     * @param $userId
     * @param $file
     * @return object
     */
    public static function uploadProfileImage($userId,$file)
    {
        $uploadedFile = PostService::storeUploadedImage($file);

        self::updateProfileImage($userId,$uploadedFile);

        return (object) [
            'status' => 200,
            'image_name' => asset('storage/images/'.$uploadedFile)
        ];
    }

    /**
     * Update user profile image
     * @param $userId
     * @param $image
     * @return string
     */
    public static function updateProfileImage($userId,$image)
    {
        return UserRepository::updateUserAccountImage($userId,$image);
    }

    /**
     * Update profile
     * @param $name
     * @param $password
     * @param $userId
     * @param $roleId
     * @return string
     */
    public static function updateAccount($name,$password,$userId,$roleId)
    {
        $user = UserRepository::updatAccount($name,$password,$userId,$roleId);

        return (object) [
            'status' => 200,
            'user' => $user,
            'message' => 'You have successfully updated you profile'
        ];
    }

    /**
     * Update author profile
     * @param $id
     * @param $name
     * @param $email
     * @param $about
     * @return string
     */
    public static function updateAuthor($id, $name, $email, $about)
    {

        $slug = Str::slug($name,'-');

        $user = UserRepository::updateAuthor($id,$name,$slug,$email,$about);

        return (object) [
            'message' =>  'You have successfully updated you profile'
        ];
    }

    /**
     * Update password
     * @param $request
     * @return string
     * @throws Exception
     */
    public static function updatePassword($request)
    {
        if(Hash::check(clean($request->current,'p'), $request->user()->password)) {

          $request->user()->update(['password' => Hash::make(clean($request->password,'p'))]);

          return (object) [
              'url' => route('author.edit',[$request->user()->slug]),
              'message' => 'Password successfully changed'
          ];
        } else {
            throw new ModelNotFoundException('Wrong password');
        }
    }

    public static function destroy($id)
    {
        return UserRepository::delete($id);
    }

}
