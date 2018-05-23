<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
	$name = $faker->realText(10);
    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
