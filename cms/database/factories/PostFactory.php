<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User'),
        'post_image' => $faker->imageUrl('900', '300'),
        'title' => $faker->sentence(7,11),
        'body' => $faker->paragraph(rand(10,15), true),
    ];
});
