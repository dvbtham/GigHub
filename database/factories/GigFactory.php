<?php

use Faker\Generator as Faker;
use Database\Helpers\QueryBuilderHelper as db;

$factory->define(App\Models\Gig::class, function (Faker $faker) {

    $artist_id = db::getTableId('users', 'id');
    $genre_id = db::getTableId('genres', 'id');

    return [
        'venue' => $faker->streetAddress,
        'date' => $faker->dateTime,
        'genre_id' => $genre_id,
        'artist_id' => $artist_id,
        'is_canceled' => false,
    ];
});
