<?php

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

Route::get('/', function () {
    return view('welcome');
});
//route with nickname
Route::get('admin/long/urlpos/home', array('as' => 'admin.home', function(){
    echo '<a href="'.route("admin.home").'">click </a>';
return 'Example url long'. route('admin.home');
}));
//pasar un parametro directo url(get)
//Route::get('post/{p}', 'PostsController@index');

//routa que proporciona los metodos del crud
//Route::resource('post', 'PostsController');
Route::get('contact', 'PostsController@contact');

Route::get('post/{id}/{name}/{tk}', 'PostsController@show_posts');
