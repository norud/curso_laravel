<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('categories')->truncate();
        DB::table('photos')->truncate();
        DB::table('roles')->truncate();
        factory(App\User::class, 10)->create()->each(function($user){
            $user->posts()->save(factory(App\Post::class)->make());
        });
        factory(App\Role::class, 3)->create();
        factory(App\Category::class, 10)->create();
        factory(App\Photo::class, 2)->create();
         //$this->call(UserTableSeeder::class);
    }
}
