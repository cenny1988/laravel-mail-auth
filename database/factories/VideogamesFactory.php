<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Videogame;
use Faker\Generator as Faker;

$factory->define(Videogame::class, function (Faker $faker) {
    return [
        'title'=> $faker ->name,
        'sub_title'=> $faker ->unique()->words(3,true),
        'rating'=> $faker ->numberBetween(0,10),
    ];
});
