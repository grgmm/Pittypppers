<?php

use Faker\Generator as Faker;

$factory->define(App\Profession::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1)
        //
    ];
});
