<?php


namespace App\Services;


use App\Repositories\CategoryRepository;

class CategoryService
{

    static public function getAll()
    {
        return CategoryRepository::all();
    }

    static public function getByName($name)
    {
        return CategoryRepository::findIdByName($name);
    }

}
