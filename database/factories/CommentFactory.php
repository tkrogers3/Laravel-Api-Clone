<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Comment;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $id= User::all()->pluck('id')->random();
    $postId= Post::all()->pluck('id')->random();
    $parentId= 0;
    return [
        'user_id'=> $id,
        'post_id' => $postId,
        'parent_id' => $parentId,
        'title' => $faker->sentence,
        'body'=> $faker->paragraph
       
    ];
});

