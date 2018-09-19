<?php

use Faker\Generator as Faker;

$factory->define(\App\History::class, function (Faker $faker) {
    return [
        'book_id' => $faker->numberBetween($min = 1, $max = 50),
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'borrowed_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now', $timezone = null),
        'returned_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 2 months', $timezone = null)
    ];
});
