<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Core\Api\Models\Product;
use Core\Api\Models\Customer;
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
$customers = Customer::withoutTrashed()->pluck('uuid')->toArray();

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'status' => $faker->randomElement(['new', 'pending', 'in review', 'approved', 'inactive', 'deleted']),
        'customer_id' => $faker->randomElement($customers),
    ];
});
