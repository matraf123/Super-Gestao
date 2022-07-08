<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'telefone' =>$faker->tollFreePhoneNumber,
        'email' => $faker->unique()->email,
        'motivo_contato' =>$faker->randomElement([1,2, 3]),
        'mensagem' => $faker->text(200)
    ];
});
