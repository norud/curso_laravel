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
use App\Post;
//Eloquente ORM
/*Route::get('find', function(){

$posts = Post::all();
foreach($posts as $p){
    echo $p->title.'<br>'.$p->content;
}
});*/
/*
Route::get('find', function(){

    $posts = Post::find(2);
        echo $posts->title.'<br>'.$posts->content;

    });
    */
/*Route::get('findwhere', function(){
    $posts = Post::where('id',2)->orderBy('id', 'desc')->take(1)->get();
    return $posts;
    // echo $posts->title.'<br>'.$posts->content;

});
*/
/*
Route::get('findmore', function(){
    return Post::findOrFail(2);
});*/
/*
//insertar y guardar
Route::get('basicinsert', function(){
    $p = new Post;
    $p->title = ' New Insert';
    $p->content = ' New insert content';
    $p->save();
    return $p;
});
*/
//update rows
/*
Route::get('update', function(){
    $p =  Post::find(2);
    $p->title = 'Update id 2';
    $p->content = 'Update content for id 2';
    $p->update();
    return $p;

});
*/
//crear con el model
/*
Route::get('create', function(){
    Post::create(
        [
            'title' => 'Title from create method',
            'content' => 'Content fromcreate method'
        ]
    );

});
*/
//update with the model
/*
Route::get('update', function(){
    Post::where('id', 2)->where('is_admin', 0)
    ->update([
        'title' => 'Updated from route using model',
        'content' => 'Updated content from route using model'
    ]);
});*/

//deleting data
/*Route::get('delete', function(){
return Post::find(3)->delete();

});
*/
//usign distroy method
//if we know the id
/*
Route::get('delete2', function(){
    //also we can pass an array
    //return Post::destroy([3,6]);
    return Post::destroy(4);
});
*/
/*
//softdelete
Route::get('sofdelete', function(){
    return Post::find(6)->delete();
});

/*
//retrieving deleted data
Route::get('readesoftdelete', function(){
    //return Post::withTrashed()->where('is_admin', 0)->get();
    //only trased
    return Post::onlyTrashed()->where('id', 6)->get();
});
*/
/*
//restoring trashed data
Route::get('restore', function(){
    return Post::withTrashed()->where('is_admin', 0)->restore();
});
*/
//deleting data permanently
Route::get('deleteper', function(){
    return Post::withTrashed()->where('id', 8)->forceDelete();
});


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
/*
Route::get('eliminar', function(){
    $del = DB::delete('delete from posts where id = ?', [1]);
    if($del){
        return $del;
    }else{
        return 'Error';
    }
});*/

