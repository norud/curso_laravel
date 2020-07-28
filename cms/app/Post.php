<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*public function setPostImageAttribute($v)
    {
        $this->attributes['post_image'] = asset($v);
    }*/

    public function getPostImageAttribute($v){
        return asset($v);
    }
}
