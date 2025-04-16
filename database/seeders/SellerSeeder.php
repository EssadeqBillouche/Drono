<?php

namespace Database\Seeders;

use App\Infrastructure\Persistence\Models\User;
use App\Infrastructure\Persistence\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        $storeCategories = array_values(Seller::STORE_CATEGORIES);

        for ($i = 1; $i <= 5; $i++) {
            $sellerUser = User::create([
                'name' => "Seller User {$i}",
                'email' => "seller{$i}@example.com",
                'password' => Hash::make('password'),
                'role' => 'seller',
                'status' => 'active'
            ]);

            Seller::create([
                'user_id' => $sellerUser->id,
                'store_name' => "Store {$i}",
                'store_category' => $storeCategories[array_rand($storeCategories)],
                'store_address' => "Store Address {$i}",
                'tax_id' => "TAX{$i}",
                'description' => "Description for Store {$i}",
                'contact_phone' => "987654321{$i}"
            ]);
        }
    }
}
