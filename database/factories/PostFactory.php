<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'category_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'post_body' => $faker->paragraphs($nb = 3, $asText = false),
        'post_slug' => str_slug($faker->sentence($nbWords = 6, $variableNbWords = true)),
        'post_image' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
