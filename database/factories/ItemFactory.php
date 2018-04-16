<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    $faker_first_name = $faker->name;
    $faker_second_name = $faker->name;
    $faker_year = $faker->year($max = 'now');
    $faker_country = $faker->country;
    $faker_region = 'region' . '_' . $faker->numberBetween($min = 1, $max = 10);
    $faker_maker = 'maker' . '_' . $faker->numberBetween($min = 1, $max = 10);
    $faker_brand = 'brand' . '_' . $faker->numberBetween($min = 1, $max = 10);
    $faker_capacity = $faker->randomElement(['700', '1000',]);
    $faker_abv = $faker->randomElement(['7', '8', '12', '13',]);
    $faker_price = $faker->numberBetween($min = 300, $max = 5000);
    $faker_discount = $faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 1);
    $faker_first_unit = $faker->randomElement(['瓶',]);
    $faker_second_unit = $faker->randomElement(['打',]);
    $faker_barcode = $faker->ean13;
    $faker_description = $faker->text;
    $faker_full_text = 
        'first_name:'.$faker_first_name.
        ',second_name:'.$faker_second_name.
        ',year:'.$faker_year.
        ',country:'.$faker_country.
        ',region:'.$faker_region.
        ',maker:'.$faker_maker.
        ',brand:'.$faker_brand.
        ',capacity:'.$faker_capacity.
        ',abv:'.$faker_abv.
        ',price:'.$faker_price.
        ',discount:'.$faker_discount.
        ',first_unit:'.$faker_first_unit.
        ',second_unit:'.$faker_second_unit.
        ',barcode:'.$faker_barcode.
        ',description:'.$faker_description.
        ',';
    $faker_user_id = $faker->numberBetween($min = 1, $max = 2);

    return [
        'first_name' => $faker_first_name,
        'second_name' => $faker_second_name,
        'year' => $faker_year,
        'country' => $faker_country,
        'region' => $faker_region,
        'maker' => $faker_maker,
        'brand' => $faker_brand,
        'capacity' => $faker_capacity,
        'abv' =>  $faker_abv,
        'price' =>   $faker_price,
        'discount' =>   $faker_discount,
        'first_unit' =>   $faker_first_unit,
        'second_unit' =>   $faker_second_unit,
        'barcode' =>  $faker_barcode,
        'description' => $faker_description,
        'full_text' => $faker_full_text,
        'user_id' =>  $faker_user_id,
    ];
});
