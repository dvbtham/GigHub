<?php

use Faker\Generator as Faker;
use Database\Helpers\QueryBuilderHelper as db;

$factory->define(App\Models\Gig::class, function (Faker $faker) {

    $artist_id = db::getTableId('users', 'id');
    $genre_id = db::getTableId('genres', 'id');

    return [
        'title' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'venue' => $faker->streetAddress,
        'date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 1 day', $timezone = null),
        'genre_id' => $genre_id,
        'artist_id' => $artist_id,
        'is_canceled' => false,
    ];
});
