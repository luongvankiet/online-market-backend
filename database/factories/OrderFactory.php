<?php

namespace Database\Factories;

use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_code' => fake()->regexify('[A-Z0-9]{10}'),
            'status' => fake()->randomElement([
                OrderStatus::PENDING,
                OrderStatus::CONFIRMED,
                OrderStatus::PAID,
                OrderStatus::SHIPPED,
                OrderStatus::COMPLETED,
                OrderStatus::CANCELLED,
            ]),
            'payment_method' => fake()->randomElement(['Paypal', 'Credit Card', 'OCD']),
            'shipping_method' => fake()->randomElement(['Pickup', 'Delivery']),
            'sub_total_price' => fake()->numberBetween($min = 1500, $max = 6000),
            'shipping_price' => fake()->numberBetween($min = 0, $max = 200),
            'discount_price' => 0,
            'total_price' => fake()->numberBetween($min = 1500, $max = 6000),
            'seller_id' => '1',
        ];
    }
}
