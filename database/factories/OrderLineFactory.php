<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderLine>
 */
class OrderLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        $quantity = fake()->numberBetween(10, 100);
        return [
            'product_name' => $product ? $product->name : fake()->name(),
            'quantity' => $quantity,
            'total_price' => $product ? $product->price * $quantity : fake()->numberBetween(1000, 6000)
        ];
    }
}
