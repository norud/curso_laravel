<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('admin', function () {
    return view('admin.index');
});


Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('post/{id}',['as' => 'home.post', 'uses' => 'AdminPostController@post']);


Route::group(['middleware' => 'admin'], function () {
    Route::resource('admin/users', 'AdminUserController');

    //posts
    Route::resource('admin/posts', 'AdminPostController');

    //categories
    Route::resource('admin/categories', 'AdminCategoryController');

    //media
    Route::resource('admin/midia', 'AdminMediaController');
    //Route::get('admin/media/upload', ['as' => 'admin.media.upload'],'AdminCategoryController@');

    //
    Route::resource('admin/comments', 'PostCommentController');
    Route::resource('admin/comments/replies', 'CommentReplyController');

});

Route::group(['middleware' => 'auth'], function () {
    Route::post('comment/reply', 'CommentReplyController@createReply');

});
