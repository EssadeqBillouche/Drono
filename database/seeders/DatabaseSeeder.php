<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,     // First create admin
            CategorySeeder::class,   // Then categories
            UserSeeder::class,      // Create regular users/clients
            SellerSeeder::class,    // Create sellers
            ProductSeeder::class,    // Create products
            ProductImageSeeder::class // Finally, add product images
        ]);
    }
}
