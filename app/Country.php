<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

    public function posts()
    {
        //we need use the table associate, in case we not are using the laravel
        //standard(conventions) we have to pass in the 3er and 4th parameter of the ids name
        return $this->hasManyThrough('App\Post', 'App\User');
    }
}
