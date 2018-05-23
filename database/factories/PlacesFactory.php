<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Place::class, function (Faker $faker) {

    return [
        'name' => $faker->city,
        'latitude' => $faker->latitude( 40, 55 ),
        'longitude' => $faker->longitude( 0, 25 ),
    ];

});
