<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participacion;
use Faker\Generator as Faker;

$factory->define(Participacion::class, function (Faker $faker) {
    return [
        'dinamica_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});

$factory->state(Participacion::class, 'pp-1', function (Faker $faker) {  //Participaciones con puntaje -1
    return [
        'alumno_id' => $faker->numberBetween($min = 1, $max = 20),
        'puntaje' => -1,
    ];
});

$factory->state(Participacion::class, 'pp0', function (Faker $faker) {  //Participaciones con puntaje 0
    return [
        'alumno_id' => $faker->numberBetween($min = 1, $max = 20),
        'puntaje' => 0,
    ];
});

$factory->state(Participacion::class, 'pp1-30', function (Faker $faker) {  //Participaciones con puntaje del 1 al 30
    return [
        'alumno_id' => $faker->numberBetween($min = 1, $max = 20),
        'puntaje' => $faker->numberBetween($min = 1, $max = 30),
    ];
});

$factory->state(Participacion::class, 'pp15-50', function (Faker $faker) {  //Participaciones con puntaje del 15 al 50
    return [
        'alumno_id' => $faker->numberBetween($min = 1, $max = 20),
        'puntaje' => $faker->numberBetween($min = 15, $max = 50),
    ];
});

$factory->state(Participacion::class, 'pp25-100', function (Faker $faker) {  //Participaciones con puntaje del 25 al 100
    return [
        'alumno_id' => $faker->numberBetween($min = 1, $max = 20),
        'puntaje' => $faker->numberBetween($min = 25, $max = 100),
    ];
});

$factory->state(Participacion::class, 'pp50-150', function (Faker $faker) {  //Participaciones con puntaje del 50 al 150
    return [
        'alumno_id' => $faker->numberBetween($min = 1, $max = 20),
        'puntaje' => $faker->numberBetween($min = 50, $max = 150),
    ];
});

$factory->state(Participacion::class, 'pp30-175', function (Faker $faker) {  //Participaciones con puntaje del 30 al 175
    return [
        'alumno_id' => $faker->numberBetween($min = 1, $max = 20),
        'puntaje' => $faker->numberBetween($min = 30, $max = 175),
    ];
});

$factory->state(Participacion::class, 'pp-1sa', function (Faker $faker) {  //Participaciones con alumno_id null con puntaje -1
    return [
        'puntaje' => -1,
    ];
});

$factory->state(Participacion::class, 'pp0sa', function (Faker $faker) {  //Participaciones con alumno_id null con puntaje 0
    return [
        'puntaje' => 0,
    ];
});

$factory->state(Participacion::class, 'pp1-175sa', function (Faker $faker) {  //Participaciones con alumno_id null con puntaje del 1 al 175
    return [
        'puntaje' => $faker->numberBetween($min = 1, $max = 175),
    ];
});
