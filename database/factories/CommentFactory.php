<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'comment'   => $faker->paragraph,
        'user_id'   => App\User::all()->random()->id,
        'lesson_id' => App\Lesson::all()->random()->id,
        'parent_id' => null,
    ];
});
