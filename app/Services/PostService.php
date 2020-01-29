<?php


namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

class PostService
{

    static public function getAll()
    {
        $data['posts'] = PostRepository::all();
        $data['users'] = UserService::getAll();

        return (object) $data;
    }

    static public function getById($id)
    {
        return PostRepository::findById($id);
    }

    static public function getByCategoryName($name)
    {
        $categoryId = CategoryService::getByName($name);

        $data['posts'] = PostRepository::findByCategory($categoryId);
        $data['users'] = UserService::getAll();

        return (object) $data;
    }

    static public function getByUser($id)
    {
        return PostRepository::findByUser($id);
    }
}
