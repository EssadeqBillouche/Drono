<?php

namespace Database\Seeders;

use App\Infrastructure\Persistence\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and accessories'
            ],
            [
                'name' => 'Fashion',
                'description' => 'Clothing and accessories'
            ],
            [
                'name' => 'Home & Living',
                'description' => 'Home decoration and furniture'
            ],
            [
                'name' => 'Health & Beauty',
                'description' => 'Health and beauty products'
            ],
            [
                'name' => 'Sports & Outdoor',
                'description' => 'Sports equipment and outdoor gear'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
