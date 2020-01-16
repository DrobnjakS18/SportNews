<?php


namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{

    public function __construct()
    {
        $this->className = 'App\Models\Category';
    }

    static public function all()
    {
        return Category::all();
    }

}
