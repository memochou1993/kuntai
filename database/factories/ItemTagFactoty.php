<?php

use Faker\Generator as Faker;

$factory->define(App\ItemTag::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'item_id' => $faker->numberBetween($min = 1, $max = 300),
    ];
});
