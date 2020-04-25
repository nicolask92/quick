<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Reservar;

$factory->define(Reservar::class, function (Faker $faker) {
    return [
        'cliente' => $faker->company,
        'fecha_hora_traslado' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '+1 years', $timezone = null),
        'pasajero' => $faker->name,
        'equipaje' => $faker->randomDigit,
        'habitacion' => $faker->numberBetween($min = 1000, $max = 3000),
        'tarifa' => $faker->word,
        'desde' => $faker->address,
        'hasta' => $faker->address,
        'solicito' => $faker->name,
        'vuelo' => $faker->name,
        'tipo_v' => $faker->name,
        'vehiculo' => $faker->word,
        'movil' => $faker->numberBetween($min = 00, $max = 50),
        'comentarios' => $faker->email,
        'tipo_c' => $faker->word,
        'voucher' => $faker->numberBetween($min = 500000, $max = 600000),
        'usuario' => $faker->name,
    ];
});
