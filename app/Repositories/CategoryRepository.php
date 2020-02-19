<?php


namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{

    public function __construct()
    {
        $this->className = 'App\Models\Category';
    }

    /**
     * Get all categories
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function all()
    {
        return Category::all();
    }

    /**
     * Find category by name
     * @param $name
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function findIdByName($name)
    {
        return Category::where('name',$name)->value('id');
    }



}
