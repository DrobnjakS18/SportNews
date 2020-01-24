<?php


namespace App\Services;


use App\Repositories\PostRepository;

class PostService
{

    static public function getAllWithCategories()
    {
        $data = PostRepository::allWithCategory();

        $items['all'] = $data;
        $items['main'] = $data->take(4);

        return (object) $items;
    }

    static public function getById($id)
    {
        return PostRepository::findById($id);
    }
}
