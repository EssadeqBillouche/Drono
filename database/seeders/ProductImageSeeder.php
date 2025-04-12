<?php

namespace Database\Seeders;

use App\Infrastructure\Persistence\Models\Product;
use App\Infrastructure\Persistence\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            // Add 3 images for each product
            for ($i = 1; $i <= 3; $i++) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => "products/product-{$product->id}-image-{$i}.jpg",
                    'is_primary' => $i === 1, // First image is primary
                    'sort_order' => $i
                ]);
            }
        }
    }
}
