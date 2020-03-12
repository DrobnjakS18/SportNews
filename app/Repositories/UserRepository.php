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
     * Find top authors with defined number
     * @param $number
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function topAuthors($number)
    {
        return User::with(['posts' => function($query) { $query->count(); }])->get()->take($number)->sortByDesc('posts');
    }

    /**
     * Find user by his slug
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



}
