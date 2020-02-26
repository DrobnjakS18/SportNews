<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','content','picture'
    ];

    /**
     *  Get user of the post
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     *  Get category of the post
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    /**
     *  Get all tags by post
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     *  Get all comments by post
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
