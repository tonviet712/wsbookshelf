<?php

use Faker\Generator as Faker;

$factory->define(\App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 30),
        'author' => $faker->name,
        'price' => $faker->numberBetween($min = 10000, $max = 500000),
        'url' => $faker->regexify('^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+\.[a-z]+(\/[a-zA-Z0-9#]+\/?)*$'),
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'status' => $faker->numberBetween($min = 0, $max = 4),
        'note' => $faker->text($maxNbChars = 20),
    ];
});
