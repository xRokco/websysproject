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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName($gender = null|'male'|'female'),
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'direction' => $faker->address,
        'surname' => $faker->lastName,
    ];
});

$factory->define(App\Rsvp::class, function (Faker\Generator $faker) use ($factory) {

    return [
        'userid' => factory(App\User::class)->create()->id,
        'eventid' => $faker->numberBetween($min = 1, $max = 4),
        'code' => str_random(10),
        
    ];
});