<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gif;
use Faker\Generator as Faker;

$factory->define(Gif::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'url'   => $faker->imageUrl($width = 640, $height = 480, 'cats'),
    ];
});
