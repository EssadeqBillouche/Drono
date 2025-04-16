<?php

namespace Database\Seeders;

use App\Infrastructure\Persistence\Models\Product;
use App\Infrastructure\Persistence\Models\Category;
use App\Infrastructure\Persistence\Models\Seller;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        // Loop through seller IDs 1 to 5
        for ($sellerId = 1; $sellerId <= 5; $sellerId++) {
            // Create 5 products for each seller ID
            for ($i = 1; $i <= 5; $i++) {
                Product::create([
                    'seller_id' => $sellerId,
                    'category_id' => $categories->random()->id,
                    'name' => "Product {$i} from Seller {$sellerId}",
                    'description' => "Description for product {$i}",
                    'price' => rand(10, 1000),
                    'stock' => rand(5, 100),
                    'is_active' => true,
                    'images' => []
                ]);
            }
        }
    }
}
