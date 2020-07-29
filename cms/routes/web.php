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
    Route::get('admin', 'AdminController@index')->name('admin.index');

    Route::get('admin/posts', 'PostController@index')->name('post.index');
    Route::get('admin/posts/create', 'PostController@create')->name('post.create');
    Route::post('admin/posts', 'PostController@store')->name('post.store');
    Route::get('admin/posts', 'PostController@index')->name('post.index');

    Route::get('admin/posts/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::delete('admin/posts/{post}/delete', 'PostController@destroy')->name('post.destroy');
    Route::patch('admin/posts/{post}/update', 'PostController@update')->name('post.update');
});
//using policy as middleware
//Route::get('admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view, post')->name('post.edit');
