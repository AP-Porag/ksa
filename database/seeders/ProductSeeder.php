<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * , , combined service
     */
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Card',
            ],
            [
                'name'        => 'Autograph Only',
            ],
            [
                'name'        => 'Combined Service',
            ],
        ];


        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
