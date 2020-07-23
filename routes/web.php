<?php

use Illuminate\Support\Facades\DB;
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
//Route::get('contact', 'PostsController@contact');

//Route::get('post/{id}/{name}/{tk}', 'PostsController@show_posts');
//insertar raw en la bd
/*
Route::get('insert', function()
{
    DB::insert('insert into posts ( title, content) values (?, ?)', [
        'Php laravel', 'Content about laravel']);
});*/

///leer datos en raw
/*Route::get('read', function(){
    $rs = DB::select('select * from posts where id = ?', [1]);

    foreach($rs as $r){
      echo $r->title.'<br>'.
      $r->content;
    }

});*/

//actualizar raw
/*Route::get('update', function(){
    $up = DB::update('update posts set title = "Update Title" where id = ?', [1]);
    if($up){
        return $up;
    }else{
        return 'Error';
    }
});*/

//eliminar
Route::get('eliminar', function(){
    $del = DB::delete('delete from posts where id = ?', [1]);
    if($del){
        return $del;
    }else{
        return 'Error';
    }
});

