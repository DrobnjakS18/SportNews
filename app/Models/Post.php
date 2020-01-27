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
        'title','content','picture','select'
    ];

    /**
     *  Get user of the post
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     *  Get category of the post
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
