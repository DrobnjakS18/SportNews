<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    /**
     * Name of the table
     */
    protected $table = 'post_tag';


    /**
     * Get tags of post tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get posts of post tags
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
