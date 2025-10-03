<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bookss;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Bookss::create([
                'title' => fake()->sentence(3),
                'author' => fake()->name(),
                'price' => fake()->numberBetween(10000, 50000),
                'published_date' => fake()->date(),
            ]);
        }
    }
}
