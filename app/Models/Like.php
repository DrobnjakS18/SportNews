<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * Get user of comment vote.
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * Get post of the comment vote.
     */
    public function post()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }

    /**
     * Get comment of the comment vote.
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class,'comment_id','id');
    }

    /**
     * Get reply of the comment vote.
     */
    public function reply()
    {
        return $this->belongsTo(Comment::class,'comment_id','id')->where('comment_id','<>',null);
    }


}
