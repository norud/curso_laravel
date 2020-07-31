<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $path ='imgs\\';
    protected $fillable = [
        'file',
    ];

    public function getFileAttribute($v)
    {
        return $this->path.$v;
    }
}
