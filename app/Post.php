<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'user_id', 'title', 'post_slug', 'post_image'
    ]

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
