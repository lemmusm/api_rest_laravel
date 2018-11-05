<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Dpto::class, function (Faker $faker) {
    return [
        'dpto' => $faker -> jobTitle,
        'location' => $faker -> companySuffix
    ];
});
