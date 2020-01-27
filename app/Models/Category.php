<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color'
    ];

    /**
     *  Get all posts from category
     */
    public function posts()
    {
        $this->hasMany('App\Models\Post','category_id');
    }

}
