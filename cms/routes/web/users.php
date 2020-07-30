<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
        //users
        Route::get('users/cretae', 'UserController@show')->name('user.create');
        Route::put('users/{user}/update', 'UserController@update')->name('user.update');
        Route::delete('users/{user}/delete', 'UserController@destroy')->name('user.destroy');
});

/**
 * in the db the role name is saved as Admin but we add a funcion at UserModel to make
 * alway to lowercase from both site(parameter and record from db)
 */
//can:view,user its the policy for User
Route::group(['middleware' => ['role:admin,', 'auth']], function () {
        //users
        Route::get('users', 'UserController@index')->name('user.index');
        Route::get('users/{user}/profile', 'UserController@show')->name('user.show');
        Route::put('users/{user}/attach', 'UserController@attach')->name('user.role.attach');
        Route::put('users/{user}/detach', 'UserController@detach')->name('user.role.detach');
});

Route::group(['middleware' => ['auth', 'can:view,user']], function () {
        //users
        Route::get('users/{user}/profile', 'UserController@show')->name('user.show');
});

