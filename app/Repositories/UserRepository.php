<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->className = 'App\Models\User';
    }

    /**
     * Get all users
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function all()
    {
        return User::all();
    }

    /**
     * Find user by id
     * @param $slug
     * @return string
     */
    static public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Find user by slug
     * @param $slug
     * @return string
     */
    static public function findBySlug($slug)
    {
        return User::where('slug',$slug)->firstOrFail();
    }

    /**
     * Find user by his role
     * @param $id
     * @return string
     */
    static public function findByRole($id)
    {
        return User::where('role_id',$id)->get();
    }

    /**
     * Update user account image
     * @param $id
     * @param $image
     * @return string
     */
    static public function updateUserAccountImage($id,$image)
    {
        $user = User::findOrFail($id);

        if (isset($image)) {
           $user->profile_picture = $image;
        }

        $user->save();

        return $user;
    }

    /**
     * Update account
     * @param $name
     * @param $password
     * @param $userId
     * @param $roleId
     * @return string
     */
    static public function updatAccount($name,$password,$userId,$roleId)
    {
        $user = User::where('role_id',$roleId)->findOrFAil($userId);

        if(isset($name)) {
            $user->name = $name;
        }

        if(isset($password)) {
            $user->password = Hash::make($password);
        }

        $user->save();

        return $user;

    }


    /**
     * Update author email
     * @param $id
     * @param $name
     * @param $slug
     * @param $email
     * @param $about
     * @return
     */
    static public function updateAuthor($id, $name, $slug, $email, $about)
    {
        $user = User::findOrFail($id);

        if(isset($name)) {
            $user->name = $name;
        }

        if(isset($slug)) {
            $user->slug = $slug;
        }

        if(isset($email)) {
            $user->email = $email;
        }

        if(isset($about)) {
            $user->about = $about;
        }

        $user->save();

        return $user;
    }

}
