<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {

    $sentence = $faker->sentence();

    return [
        'user_id' => random_int(1, 1),
        'category_id' => random_int(1, 3),
        'title' => $sentence,
        'content' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'post_slug' => str_slug($sentence),
        'post_image' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
