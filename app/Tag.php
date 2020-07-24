<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //share to many
    public function posts()
    {
        //this taggable is the table name
        return $this->morphedByMany('App\Post', 'taggable');
    }
    public function videos()
    {
        //this taggable is the table name
        return $this->morphedByMany('App\Video', 'taggable');
    }
}
