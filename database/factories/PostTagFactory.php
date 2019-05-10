<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\PostTag;
use Faker\Generator as Faker;

$factory->define(PostTag::class, function (Faker $faker) {
    return [
        'tag_id'=>mt_rand(1, 20),
        'post_id'=>mt_rand(1,20)
    ];
});
