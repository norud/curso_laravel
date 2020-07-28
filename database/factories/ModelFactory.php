<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use App\Photo;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role_id' => 2,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make(Str::random(15)), // password
        'remember_token' => Str::random(10),
    ];

});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,0),
        'photo_id' => 1,
        'title' => $faker->sentence(7,11),
        'body' => $faker->paragraph(rand(10,15), true), // password
        'slug' => $faker->slug(),
    ];

});

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Admin', 'Editor', 'Suscriptor', 'Moderador'])
    ];

});
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Libros', 'Informatica', 'Trabajos', 'Inseguridad'])
    ];

});

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'name' => 'image.jpg'
    ];

});
