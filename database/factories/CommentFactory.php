<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(0, 11),
        'user_id' => $faker->numberBetween(0, 6),
        'is_active' => 1,
        'body' => $faker->paragraph,

    ];
});
