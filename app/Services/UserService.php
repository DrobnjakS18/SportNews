<?php


namespace App\Services;


use App\Repositories\UserRepository;

class UserService
{

    static public function getAll()
    {
        return UserRepository::all();
    }

    static public function getByName($name)
    {
        return UserRepository::findByName($name);
    }

    static public function getByRole($id)
    {
        return UserRepository::findByRole($id);
    }
}
