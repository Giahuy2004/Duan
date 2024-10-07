<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $products = [
            [
                'name' => 'Sample Product',
                'type' => 'Simple',
                'description' => 'This is a sample product.',
                'price' => 100.00,
                'stock_quantity' => 10,
                'images' => json_encode(['image1.jpg', 'image2.jpg']),
            ],
        ];

        // Insert products into the database
        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
