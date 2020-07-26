<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //use softdelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id','title', 'content'
    ];
    //inverse for relationship one to one
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photos()
    {
        # code...
        return $this->morphMany('App\Photo', 'imageable');
    }
    //polimorphic relation many to many
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    //scope
    public static function scopesLatest($query)
    {
       return $query->orderBy('id', 'asc')->get();
    }
}
