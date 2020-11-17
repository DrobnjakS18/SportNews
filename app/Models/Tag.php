<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     *  Get all posts by tag
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
