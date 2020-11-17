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
        return $this->belongsTo(User::class);
    }

    /**
     *  Get category of the post
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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

    /**
     *  Get all likes by post
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

//    /**
//     *  Get next post
//     */
//    public function nextPost()
//    {
//        return  Post::where('id','>',$this->id)->first();
//    }
//
//    /**
//     *  Get previous post
//     */
//    public function previousPost()
//    {
//        return Post::where('id','<',$this->id)->orderByDesc('id')->first();
//    }


}
