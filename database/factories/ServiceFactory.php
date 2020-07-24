<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Service;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Service::class, function (Faker $faker, $attribues) {
    return [
        'service_provider_id' => $attribues['service_provider_id'],
        'name' => "{$faker->jobTitle} Services",
        'description' => $faker->paragraph(),
        'amount' => $faker->randomFloat(2, 10, 100),
    ];
});
