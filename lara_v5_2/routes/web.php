<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('admin', function () {
    return view('admin.index');
});


Route::get('/home', 'HomeController@index');
Route::get('post/{slug}',['as' => 'home.post', 'uses' => 'AdminPostController@post']);


Route::group(['middleware' => 'admin'], function () {
    Route::resource('admin/users', 'AdminUserController',['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'
    ]]);

    //posts
    Route::resource('admin/posts', 'AdminPostController',['names'=>[
        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit',
        'show' => 'admin.comments.show'
    ]]);

    //categories
    Route::resource('admin/categories', 'AdminCategoryController',['names'=>[
        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit'
    ]]);

    //media
    Route::resource('admin/midia', 'AdminMediaController',['names'=>[
        'index'=>'admin.midia.index',
        'create'=>'admin.midia.create',
        'store'=>'admin.midia.store',
        'edit'=>'admin.midia.edit'
    ]]);
    //Route::get('admin/media/upload', ['as' => 'admin.media.upload'],'AdminCategoryController@');

    //
    Route::resource('admin/comments', 'PostCommentController',['names'=>[
        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit'
    ]]);
    Route::resource('admin/comments/replies', 'CommentReplyController',['names'=>[
        'index'=>'admin.replies.index',
        'create'=>'admin.replies.create',
        'store'=>'admin.replies.store',
        'edit'=>'admin.replies.edit'
    ]]);

});

Route::group(['middleware' => 'auth'], function () {
    Route::post('comment/reply', 'CommentReplyController@createReply',['names'=>[
        'index'=>'admin.reply.index',
        'create'=>'admin.reply.create',
        'store'=>'admin.reply.store',
        'edit'=>'admin.reply.edit'
    ]]);

});
