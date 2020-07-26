<?php

use App\Country;
use App\News;
use App\Photo;
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
use App\Role;
use App\Staff;
use App\Tag;
use App\Task;
use App\User;
use App\Video;
use Carbon\Carbon;

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
    $p->user_id = 1;
    //$p->title = ' New Insert';
    //$p->content = ' New insert content';
    $p->title = 'Una empresa israelí crea una prueba que detecta el coronavirus en 30 segundos';
    $p->content = 'Una foto muestra con punzante claridad las diferencias en el combate al covid-19 que se da en dos países vecinos, Estados Unidos y Canadá, con una icónica maravilla natural como telón de fondo.

    Acercarse en bote a las Cataratas del Niágara es una experiencia muy gustada por los turistas, y tanto en el lado canadiense como en el estadounidense empresas operan barcos para ese fin. La pandemia de covid-19 ciertamente ha afectado severamente a esa actividad, pero una vez que ha comenzado la reapertura de negocios en ambos países, esos navíos han levado anclas de nuevo y llevan turistas a contemplar el poder y la belleza de la caída de las aguas del Niágara.';
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
/*
Route::get('deleteper', function(){
    return Post::withTrashed()->where('id', 8)->forceDelete();
});
*/
//ElOQUENT Relationship
/*
Route::get('user/{id}/post', function($id){
    //if is just one to one we can call the method without ()
    //return User::find($id)->post; no ->post()
    return User::find($id)->post->title;
});
*/
/*
//inverse
Route::get('post/{id}/user', function($id){
    return Post::find($id)->user->name;

});
*/
/*
//one to many
Route::get('posts', function(){
    $users = User::find(1);
    foreach($users->posts as $p){
        echo $p->title.'<br>';
    }

});*/
/*
//manytomany
Route::get('user/{id}/role', function($id){
    /*$users = User::find($id);
    foreach($users->roles as $r){
        echo $r->name;

    }*/
    //other option
    //return User::find($id)->roles()->orderBy('id', 'desc')->get();
/*
});
*/

//accessing the intermediate table pivot
/*Route::get('user/pivot', function(){
    $user = User::find(1);
    foreach($user->roles as $r){
        echo $r->pivot->created_at;
    }

});
*/
/*
Route::get('user/country', function(){
    //
    $cont = Country::find(4);
    foreach($cont->posts as $p){
        echo $p->title;
    }
});
*/

//polymorphic relation
/*
Route::get('poly/user', function(){

    $user = User::find(2);
    foreach($user->photos as $p){
        echo $p->path;

    }
});
Route::get('poly/{id}/post', function($id){

    $post = Post::find($id);
    foreach($post->photos as $p){
        echo $p->path.'<br>';

    }
});
*/
/*
//return the owner of the photos
Route::get('photo/{id}', function($id){
    $photo = Photo::findOrFail($id);

    return $photo->imageable;

});
*/
//polymorphic many to many
/*
Route::get('post/tag', function(){
    $post = Post::find(1);
    foreach($post->tags as $t){
        echo $t->name;
    }
});
*/
/*
Route::get('tags/post', function(){
    $tag = Tag::find(2);
    foreach($tag->posts as $p){
        echo $p->title;

    }
});
*/
//one to many crud
/*
Route::get('create', function(){
    $user = User::findOrFail(1);
    $user->newsUser()->save(new News([
        'name' => 'Notica alerta covid19'
    ]));

});*/
//
/*
Route::get('read', function(){
    $user = User::findOrFail(1);
    foreach($user->newsUser as $p){
        echo $p->name;
    }
    //dd($user->newsUser);
});
*/
/*
Route::get('update', function(){
    $user = User::findOrFail(1);
    $user->newsUser()->whereId(1)->update([
        'name' => 'Update news'
    ]);

});
*/
/*
Route::get('delete', function(){
    $user = User::find(1);
    $user->newsUser()->whereId(1)->delete();

});
*/

//one to many crud
/*
Route::get('create', function(){
    $user = User::findOrFail(1);

    $task = new Task([
        'title' => 'Task 1',
        'body' => 'just working'
    ]);
    $user->tasks()->save($task);
});
*/
/*
Route::get('read', function(){
    $user = User::findOrFail(1);
    foreach($user->tasks as $t){
        echo $t->title.'<br>';

    }
});
*/
/*
Route::get('update', function(){
    $user = User::findOrFail(1);
    $user->tasks()->whereId(1)->update([
        'title' => 'Update task 1 from eoute'
    ]);
});
*/
/*
Route::get('delete', function(){
    $user = User::findOrFail(1);
    $user->tasks()->whereId(1)->delete();
});
*/
//many to many crud
/*
Route::get('create', function(){
    $user = User::find(1);

    $user->roles()->save(new Role([
        'name' => 'Seller'
    ]));
});
*/
/*
Route::get('read', function(){
    $user = User::find(1);
foreach($user->roles as $t){
    echo $t->name.'<br>';

}
});
*/
/*
Route::get('updater', function(){
    $user = User::findOrFail(1);
    if($user->has('roles')){
        foreach($user->roles as $r){
            if($r->name == 'adminitrador'){
                $r->name = 'admin';
                $r->save();
            }

        }
    }else{
        dd($user->roles);
    }
});
*/
/*
Route::get('delete', function(){
    $user = User::findOrFail(1);
    foreach($user->roles as $r){
        $r->whereId(3)->delete();
    }
});
*/
/*
Route::get('attach', function(){

    $user = User::findOrFail(1);
    $user->roles()->attach(2);
});
Route::get('detach', function(){

    $user = User::findOrFail(1);
    $user->roles()->detach(2);
});
Route::get('sync', function(){

    $user = User::findOrFail(1);
    $user->roles()->sync([2,3]);
});
*/
//polymorphic ralationship CRUDE
/*
Route::get('create', function(){
    $staff = Staff::find(1);
    return $staff->photos()->create(['path' => 'santos.jgp']);
});
*/
/*
Route::get('read', function(){
    $staff = Staff::findOrFail(1);
    foreach($staff->photos as $p){
       return $p->path;
    }
});

*/
/*
Route::get('update', function(){
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos()->whereId(5)->first();
    $photo->path = 'update_picture.jpg';
    $photo->save();

});
*/
//
/*
Route::get('delete', function(){
    return Staff::findOrFail(1)->photos()->whereId(5)->delete();

});

*/
/*
Route::get('assign', function(){
    $staff = Staff::findOrFail(2);
    $photo = Photo::findOrFail(6);

    $staff->photos()->save($photo);

});
*/
/*
Route::get('un_assign', function(){
    $staff = Staff::findOrFail(2);
    $staff->photos()->whereId(6)->update([
      'imageable_id' => 0,
      'imageable_type' => ''
    ]);
});
Route::get('read', function(){
});
*/
/*
Route::get('create', function(){
    $post = Post::create([
        'title'=> 'Inserting post',
        'content' => 'content for inserting post'
    ]);
    $tag = Tag::find(1);
    //attach
    $post->tags()->save($tag);

    $tag2 = Tag::find(2);
    $video = Video::create([
        'name' => 'insert.mov'
    ]);
    $video->tags()->save($tag2);
});
*/
/*
Route::get('read', function(){
    $post = Post::findOrFail(1);
    foreach($post->tags as $t){
        echo $t->name;
    }
});
*/
/*
Route::get('update', function(){
    $post = Post::find(1);
    $tag = Tag::find(3);
    //$post->tags()->save($tag);
    //return $post->tags()->attach($tag);

    $post->tags()->sync([1]);
});
*/
/*
Route::get('delete', function(){
    $post = Post::find(1);
    foreach($post->tags as $t){
        $t->whereId(3)->delete();
    }
});
*/


Route::get('/', function () {
    return view('welcome');
});
//route with nickname
/*
Route::get('admin/long/urlpos/home', array('as' => 'admin.home', function(){
    echo '<a href="'.route("admin.home").'">click </a>';
return 'Example url long'. route('admin.home');
}));
*/
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

/**
 * CRUD APP
 */
Route::group(['middleware' => 'web'], function () {
    Route::resource('posts', 'PostsController');
});
Route::get('dates', function(){
    $date = new DateTime('+1 week');
    echo $date->format('m-d-Y').'<br>';
    echo Carbon::now()->addDays(10)->diffForHumans();
    echo '<br>'. Carbon::now()->subMonths(15)->diffForHumans();
    echo '<br>'.Carbon::now()->yesterday()->diffForHumans();
});

Route::get('getname', function(){
    $user = User::find(1);
    echo $user->name;
});
Route::get('setname', function(){
    $user = User::find(1);
    $user->name = 'ramon';
    $user->save();
});
