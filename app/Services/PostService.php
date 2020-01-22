<?php


namespace App\Services;


use App\Repositories\PostRepository;

class PostService
{

    static public function getAllWithCategories()
    {
        return PostRepository::allWithCategory();
    }

    static public function getById($id)
    {
        return PostRepository::findById($id);
    }
}
