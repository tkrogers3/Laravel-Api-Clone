<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use App\User;

$factory->define(Post::class, function (Faker $faker) {
    $id= User::all()->pluck('id')->random();

    return [
        'user_id'=> $id,
        'title' => $faker->sentence,
        'body'=> $faker->paragraph
        
    ];
});
