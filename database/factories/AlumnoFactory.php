<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alumno;
use Faker\Generator as Faker;

$factory->define(Alumno::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'username' => $faker->unique()->userName,
        'grupo_id' => $faker->numberBetween($min = 1, $max = 3),
        //'unregistered_user'
    ];
});
