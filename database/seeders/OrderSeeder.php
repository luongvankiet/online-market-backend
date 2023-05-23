<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Order::factory()
            ->hasOrderLines(5)
            ->hasOrderBillingAddress(1)
            ->hasOrderShippingAddress(1)
            ->count(10)
            ->create();
    }
}
