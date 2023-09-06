<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['name' => 'Fruits'],
            ['name' => 'Edible'],
            ['name' => 'Exported'],
            ['name' => 'Vegetable'],
            ['name' => 'Millets'],
            ['name' => 'Cereals'],
            ['name' => 'Nuts'],
            ['name' => 'Plants'],
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
