<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Card',
            ],
            [
                'name'        => 'Autograph Authentication',
            ],
            [
                'name'        => 'Combined Service',
            ],
            //authentication
            [
                'name'        => 'Reholder',
            ],
            [
                'name'        => 'Crossover',
            ],
        ];


        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
