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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    $photoUrls = array("/images/users/IMG_20161115_112939.jpg", "/images/users/IMG_20161115_113004.jpg", "/images/users/IMG_20161115_113023.jpg", "/images/users/IMG_20161115_113037.jpg", "/images/users/IMG_20161115_113100.jpg");
    return [
        'first_name' => $faker->firstNameFemale,
        'insertion' => '',
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => str_random(10),
        'verified' => rand(0, 1),
        'role_id' => rand(1, 4),
        'enabled' => rand(0, 1),
        'image' => $photoUrls[rand(0, 4)],
        'prefered_language' => $faker->languageCode,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Colloquium::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->jobTitle,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'user_id' => rand(1, 5),
        'room_id' => rand(1, 3),
        'start_date' => $faker->dateTimeThisMonth($max = 'now'),
        'end_date' => $faker->dateTimeThisMonth($max = 'now'),
        'type_id' => rand(1, 2),
        'approved' => rand(0, 1),
        'language_id' => rand(1, 3),
        'invite_email' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'company_image' => $faker->imageUrl(100, 200, 'cats'),
        'company_url' => $faker->url,
    ];
});

$factory->define(App\Models\Invitee::class, function (Faker\Generator $faker) {
    return [
        'colloquium_id' => rand(1, 5),
        'email' => $faker->safeEmail,
    ];
});

$factory->define(App\Models\Mailtemplate::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'subject' => $faker->sentence,
        'body' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
