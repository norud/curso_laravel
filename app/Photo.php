<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //here let the photos
    public function imageable()
    {
        # code...
        return $this->morphTo();
    }
}
