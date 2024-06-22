<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $products = product::all();

        foreach ($products as $product) {
            for ($i = 0; $i < 3; $i++) {
                Image::create([
                    'url' => 'default-product.png',
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
