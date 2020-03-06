<?php


namespace App\Services;


use App\Repositories\UserRepository;

class UserService
{

    /**
     * Get all users
     * @return \App\Models\User[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function getAll()
    {
        return UserRepository::all();
    }

    /**
     * Get user by name
     * @param $name
     * @return \App\Models\User[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function getByName($name)
    {
        return UserRepository::findByName($name);
    }

    /**
     * Get user by role
     * @param $id
     * @return \App\Models\User[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function getByRole($id)
    {
        return UserRepository::findByRole($id);
    }

    /**
     * Get multiple users paginated
     * @param $name
     * @return object
     */
    static public function getByNamePostsPaginate($name)
    {
        $data['users'] = UserRepository::all();
        $data['user'] = UserRepository::findByName($name);
        $data['posts'] = PostService::getByUser($data['user']->id);

        return (object)$data;
    }

    /**
     * Upload image local
     * @param $userId
     * @param $file
     * @return object
     */
    static public function uploadProfileImage($userId,$file)
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
    static public function updateProfileImage($userId,$image)
    {
        return UserRepository::updateUserImage($userId,$image);
    }

}
