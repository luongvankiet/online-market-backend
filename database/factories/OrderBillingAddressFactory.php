<?php

namespace Database\Factories;

use Faker\Generator;
use Faker\Provider\en_AU\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderBillingAddress>
 */
class OrderBillingAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = new Generator();
        $faker->addProvider(new Address($faker));

        return [
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' => fake()->numberBetween(1, 100) . $faker->buildingLetter . ' ' . $faker->streetSuffix,
            'city' => $faker->cityPrefix,
            'state' => $faker->state,
            'country' => 'Australia',
        ];
    }
}
