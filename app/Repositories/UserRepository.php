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

}
