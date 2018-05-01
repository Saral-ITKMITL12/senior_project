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
  $input = array("คณะวิศวกรรมศาสตร์", "Morpheus", "Trinity", "Cypher", "Tank");
  $user1 = array_rand($input);
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
        'faculty' => $input[$user1]
    ];
});

$factory->define(App\AuctionProduct::class, function (Faker $faker) {
  $input = array("สินค้าทั้งหมด", "อุปกรณ์การเรียนเฉพาะทาง", "ของใช้ภายในหอพัก", "อุปกรณ์ไอที", "อุปกรณ์กีฬา
", "เครื่องดนตรี", "อื่นๆ", "Tank");
  $user1 = array_rand($input);
    return [
        'title' =>  $input[$user1],
        'description' => $faker->paragraph(2),
        'price' => $faker->numberBetween(100, 200),
        'start_price' => $faker->numberBetween(10, 100),
        'images' => '["example.png"]',
        'open_time' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'close_time' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'bid_step' => $faker->numberBetween(10, 100),
        'user_id' => '1',
        'category' => $input[$user1]
    ];
});
