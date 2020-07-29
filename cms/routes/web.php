<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('post/{post}', 'PostController@show')->name('post');

Route::group(['middleware' => ['auth']], function () {
    //admin
    Route::prefix('admin')->group(function () {

        Route::get('/', 'AdminController@index')->name('admin.index');

        Route::get('posts', 'PostController@index')->name('post.index');
        Route::get('posts/create', 'PostController@create')->name('post.create');
        Route::post('posts', 'PostController@store')->name('post.store');
        Route::get('posts', 'PostController@index')->name('post.index');

        Route::get('posts/{post}/edit', 'PostController@edit')->name('post.edit');
        Route::delete('posts/{post}/delete', 'PostController@destroy')->name('post.destroy');
        Route::patch('posts/{post}/update', 'PostController@update')->name('post.update');

        //users
        Route::get('users/{user}/profile', 'UserController@show')->name('user.show');
        Route::put('users/{user}/update', 'UserController@update')->name('user.update');
    });
});
//using policy as middleware
//Route::get('admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view, post')->name('post.edit');
