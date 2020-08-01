<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
class Post extends Model //implements SluggableInterface
{

    use Sluggable;
    use SluggableScopeHelpers;


    protected $fillable = [
        'user_id',
        'category_id',
        'photo_id',
        'title',
        'body',
        'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }


}
