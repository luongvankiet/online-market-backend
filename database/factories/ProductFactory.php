<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->realText(),
            'image' => fake()->image('public/images', 640, 480, null, false),
            'status' => fake()->randomElement(['in_stock', 'out_of_stock']),
            'quantity' => fake()->numberBetween(0, 100),
            'regular_price' => fake()->numberBetween(100, 1000),
            'sale_price' => fake()->numberBetween(100, 1000),
            'unit' => fake()->randomElement(['pounds', 'kilograms', 'pieces']),
            'seller_id' => '1',
            'published_at' => now(),
        ];
    }
}
