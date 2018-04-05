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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\AuctionProduct::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph(2),
        'price' => $faker->numberBetween(10, 100),
        'images' => '["3327.jpg","3355.jpg"]',
        'open_time' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'close_time' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'bid_step' => $faker->numberBetween(10, 100),
        'user_id' => '1'
    ];
});
