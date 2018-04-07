<?php

use Faker\Generator as Faker;

$factory->define(App\Animal::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'dob' => $faker->year,
        'active' => $faker->boolean,
        'own' => $faker->boolean,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
});
