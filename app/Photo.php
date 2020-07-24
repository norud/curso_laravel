<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path', 'imageable_id', 'imageable_type'
    ];
    //here let the photos
    public function imageable()
    {
        # code...
        return $this->morphTo();
    }
}
