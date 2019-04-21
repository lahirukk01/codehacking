<?php

use Faker\Generator as Faker;

$factory->define(App\CommentReply::class, function (Faker $faker) {
    return [
        'comment_id' => $faker->numberBetween(1, 21),
        'user_id' => $faker->numberBetween(1, 6),
        'is_active' => 1,
        'body' => $faker->paragraph(),
    ];
});
