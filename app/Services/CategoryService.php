<?php


namespace App\Services;


use App\Repositories\CategoryRepository;

class CategoryService
{

    static public function getAll()
    {
        return CategoryRepository::all();
    }

}
