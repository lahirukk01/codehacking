<?php

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'body' => $faker->paragraph(),
        'slug' => $faker->slug,
        'photo_id' => $faker->randomElement([1,2,3,8,9,10,11,12,13]),
        'category_id' => $faker->numberBetween(0, 11),
    ];
});
