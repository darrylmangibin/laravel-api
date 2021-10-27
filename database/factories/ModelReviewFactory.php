<?php

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        'product_id' => function () {
            return Product::all()->random()->id;
        },
        'customer' => $faker->name(),
        'review' => $faker->paragraph(),
        'star' => $faker->numberBetween(0, 5)
    ];
});
