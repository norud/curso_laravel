<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    //inverse rols to users
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
