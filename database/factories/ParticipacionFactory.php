<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participacion;
use Faker\Generator as Faker;

$factory->define(Participacion::class, function (Faker $faker) {
    return [
        'dinamica_id' => $faker->numberBetween($min = 1, $max = 10),
        'puntaje' => $faker->numberBetween($min = -1, $max = 300),
        'alumno_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
