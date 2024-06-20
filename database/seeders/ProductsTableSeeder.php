<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            product::create([
                'product_name' => $faker->words(3, true),
                'product_number' => $faker->unique()->numerify('PROD-####'),
                'product_category' => $faker->randomElement(['Makaroni', 'Keripik', 'Lain-lain']),
                'product_price' => $faker->numberBetween(1000, 50000),
                'product_stock' => $faker->numberBetween(1, 100),
                'product_description' => $faker->paragraph,
                'product_tag' => implode(',', $faker->randomElements(['Original', 'Makaroni', 'Keripik', 'Lain-lain'], 3, false)),
                'product_weight' => $faker->numberBetween(100, 10000),
                'product_length' => $faker->numberBetween(10, 200),
                'product_breadth' => $faker->numberBetween(10, 200),
                'product_width' => $faker->numberBetween(10, 200),
            ]);
        }
    }
}
