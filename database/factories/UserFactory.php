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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token'    => str_random(10),
    ];
});

$factory->define(App\Level::class, function (Faker $faker) {
    return [
        'title'       => $faker->name,
        'uuid'        => $faker->uuid,
        'slug'        => str_slug($faker->name),
        'covered'     => $faker->imageUrl(),
        'description' => $faker->sentence,
        'result_from' => $faker->randomNumber(),
    ];
});

$factory->define(App\Series::class, function (Faker $faker) {
    return [
        'level_id'    => App\Level::all()->random()->id,
        'uuid'        => $faker->uuid,
        'identifier'  => str_random(10),
        'title'       => $faker->name,
        'covered'     => $faker->imageUrl(),
        'slug'        => str_slug($faker->name),
        'description' => $faker->sentence,
    ];
});

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'series_id'   => App\Series::all()->random()->id,
        'uuid'        => $faker->uuid,
        'identifier'  => 'BYklWycgWws',
        'slug'        => str_slug($faker->name),
        'covered'     => $faker->imageUrl(),
        'title'       => $faker->name,
        'url'         => $faker->url,
        'description' => $faker->sentence,
    ];
});
