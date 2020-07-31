<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'photo_id', 'is_active', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
      return $this->belongsTo('App\Role');

    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
    public function isAdmin()
    {
        return ($this->role->name == 'administrator' && $this->is_active == 1)
        ?true
        :false;
    }
}
