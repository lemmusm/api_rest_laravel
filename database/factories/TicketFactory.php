<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Ticket::class, function (Faker $faker) {
    return [
        'token_id' => $faker -> md5,
        'user_uid' => function() {
            return User::all()->random();
        },
        'service' => $faker -> word,
        'description' => $faker -> text,
        'diagnostic' => $faker -> text,
        'status' => $faker -> word,
        'support' => $faker -> email
    ];
});
