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

$factory->define(App\Rsvp::class, function (Faker\Generator $faker) {
	$values = array();
for ($i=4; $i < 53; $i++) {
  // get a random digit, but always a new one, to avoid duplicates
  $values []= $faker->unique()->randomDigit;
}
    return [
        'userid' => $values,
        'eventid' => $faker->numberBetween($min = 1, $max = 4),
        'code' => bcrypt(str_random(5)),
        
    ];
});