<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'pin' => $faker->boolean,
        'user_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});
