<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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
    public static function all()
    {
        return User::with(['posts'])->get();
    }

    /**
     * Find user by id
     * @param $slug
     * @return string
     */
    public static function findById($id)
    {
        return User::findOrFail($id);
    }


    public static function topUsers($role,$number)
    {
        return User::whereHas('role', function (Builder $query) use ($role) {
            $query->where('name',$role);
        })->limit($number)->get();
    }

    /**
     * Find user by slug
     * @param $slug
     * @return string
     */
    public static function findBySlug($slug)
    {
        return User::where('slug',$slug)->firstOrFail();
    }

    /**
     * Find user by his role
     * @param $id
     * @return string
     */
    public static function findByRole($id)
    {
        return User::where('role_id',$id)->get();
    }

    /**
     * Update user account image
     * @param $id
     * @param $image
     * @return string
     */
    public static function updateUserAccountImage($id,$image)
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
    public static function updatAccount($name,$password,$userId,$roleId)
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
    public static function updateAuthor($id, $name, $slug, $email, $about)
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
