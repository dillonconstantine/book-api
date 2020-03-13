<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'uuid'     => $faker->uuid,
        'title'    => ucwords(substr_replace($faker->sentence($nbWords = 3, $variableNbWords = true), '', -1)),
        'author'   => $faker->name(),
        'released' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
