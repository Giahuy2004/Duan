<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Category 1',
                'description' => 'Description of category 1',
            ],
            [
                'name' => 'Category 2',
                'description' => 'Description of category 2',
            ],
        ];

        // Insert categories into the database
        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
        
    }
}
