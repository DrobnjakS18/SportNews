<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug', 'email', 'password','profile_picture','bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Count posts by single author
     *
     * @var array
     */
    protected $appends = ['post_count'];

    public function getPostCountAttribute()
    {
        return $this->attributes['post_count'] = $this->posts->count();
    }

    /**
     *  Get all posts from user
     */
    public function posts()
    {
       return $this->hasMany(Post::class);
    }

    /**
     *  Get the role of the user
     */
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }

    /**
     *  Gets all tags by post
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     *  Get all comments by user
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     *  Get all user by voted likes
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
