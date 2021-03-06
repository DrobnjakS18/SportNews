<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
    ];

    /**
     * Get the user of current comment
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get post of current comment
     *
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get replies of current comment
     *
     */
    public function replies()
    {
        return $this->hasMany(Comment::class)->where('comment_id','<>',null);
    }

    /**
     *  Get all like by coment
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }


}
