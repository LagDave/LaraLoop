<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
        'body'=> $faker->realText($maxNbChars = 5000, $indexSize = 2),
        'user_id'=>mt_rand(1, 20),
        'category_id'=>mt_rand(1,5)
    ];
});
