<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->className = 'App\Models\User';
    }

    static public function all()
    {
        return User::all();
    }

    static public function findByName($name)
    {
        return User::where('name',$name)->first();
    }

    static public function findByRole($id)
    {
        return User::where('role_id',$id)->get();
    }

    /**
     * Update user profile image
     * @param $id
     * @param $image
     * @return string
     */
    static public function updateUserImage($id,$image)
    {
        $user = User::findOrFail($id);

        if (isset($image)) {
           $user->profile_picture = $image;
        }

        $user->save();

        return $user;
    }

}
