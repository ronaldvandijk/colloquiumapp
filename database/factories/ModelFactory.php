<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'verified' => rand(0,1),
        'role_id' => rand(1,4),
        'enabled' => rand(0,1),
        'image' => $faker->imageUrl($width, $height, 'cats'),
        'prefered_language' => $faker->languageCode,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Colloquium::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->jobTitle,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'user_id' => rand(1,5),
        'room_id' => rand(1,3),
        'start_date' => $faker->dateTimeThisMonth($max = 'now'),
        'end_date' => $faker->dateTimeThisMonth($max = 'now'),
        'type_id' => rand(1,2),
        'invite_email' => $faker->randomHtml(2,3),
        'company_image' => $faker->imageUrl($width, $height, 'cats'),
        'company_url' => $faker->url,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Invitee::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'colloquium_id' => rand(1,5),
        'email' => $faker->safeEmail,
        'remember_token' => str_random(10),
    ];
});