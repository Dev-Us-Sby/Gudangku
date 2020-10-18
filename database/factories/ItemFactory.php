<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Item;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'product_name' => $faker->safeColorName,
        'qty' => random_int(1, 100),
        'date_in' => $faker->dateTimeBetween('-50 day', '-16 minute'),
    ];
});
