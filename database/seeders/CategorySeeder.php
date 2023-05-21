<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::factory()
            ->hasProducts(5)
            ->count(4)
            ->sequence(
                ['name' => 'Fruits'],
                ['name' => 'Vegetables'],
                ['name' => 'Diary, Eggs & Meals'],
                ['name' => 'Drinks']
            )
            ->create();
    }
}
