<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function isAdmin()
    {
        return ($this->role->name == 'administrator') ? true : false;
    }

    //one to one relationship
    public function post()
    {
        //if the user id is differet to user_id most writte how you call id_user_post
        //return $this->hasOne('App\Post', 'id_user_post);
        return $this->hasOne('App\Post');
    }
    //has many
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    /*
    //pivot table user for roles
    public function roles()
    {
        //if we use different connection laravel. we can pass the second parameter table name and pass
        //the ids
        return $this->belongsToMany('App\Role');//->withPivot('created_at');
    }*/
    //her user can have photos searching at column imageable_id, in that column
    //alway be asociate with the primary keys table related
    //imageable_type that column indicate which model
    //exaamples:
    /**
     * imageable_id(the value is the user id), imageable_type(the value is App\User)
     * imageable_id(the value is the posts id), imageable_type(the value is App\Post)
     *  */
    /*
    public function photos()
    {
        # code...
        return $this->morphMany('App\Photo', 'imageable');
    }
    //one to many
    public function newsUser()
    {
        return $this->hasMany('App\News');
    }
    //one to many crud
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
    public function getNameAttribute($v)
    {
        //return ucfirst($v);
        return strtoupper($v);
    }
    //mutator
    public function setNameAttribute($v)
    {
        return $this->attributes['name'] = strtoupper($v);
    }*/

}
