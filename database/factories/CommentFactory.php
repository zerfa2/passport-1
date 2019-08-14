<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id'=> \App\Post::all()->random()->id,
        'user_id'=> \App\User::all()->random()->id,
        'content'=> $faker->text($maxNbChars= 200)
    ];
});
