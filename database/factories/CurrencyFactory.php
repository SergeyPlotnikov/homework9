<?php

use Faker\Generator as Faker;

$factory->define(\App\Currency::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->firstName,
        'short_name' => $faker->currencyCode,
        'logo_url' => $faker->imageUrl(32, 32),
        'price' => $faker->numberBetween(0, 10000)
    ];
});
