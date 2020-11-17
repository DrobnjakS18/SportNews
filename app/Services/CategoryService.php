<?php


namespace App\Services;


use App\Repositories\CategoryRepository;

class CategoryService
{

    public static function getAll()
    {
        return CategoryRepository::all();
    }

    public static function getByName($name)
    {
        return CategoryRepository::findIdByName($name);
    }

}
