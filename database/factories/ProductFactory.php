<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'vendor_id' => $faker->numberBetween(1,4),
        'status' => 1,
        'category_id' => $faker->numberBetween(1,5),
        'unit_id' => $faker->numberBetween(1,10),
        'name'=> $faker->name,
        'price' => $faker->numberBetween(25, 850),
        'description' => $faker->text(100),
        'image' => $faker->imageUrl(850, 640, 'food',true),
        'user_id' => $faker->numberBetween(1,4),
        //
    ];
});
