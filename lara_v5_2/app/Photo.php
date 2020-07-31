<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $path ='imgs/users/';
    protected $fillable = [
        'file',
    ];

    public function getFileAttribute($v)
    {
        return asset($this->path.$v);
    }
}
