<?php

namespace Database\Seeders;

use App\Infrastructure\Persistence\Models\User;
use App\Infrastructure\Persistence\Models\Admin;
use App\Infrastructure\Persistence\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'active'
        ]);

        Admin::create([
            'user_id' => $adminUser->id,
            'permission_level' => 'super_admin'
        ]);

        // Create Clients
        for ($i = 1; $i <= 5; $i++) {
            $clientUser = User::create([
                'name' => "Client User {$i}",
                'email' => "client{$i}@example.com",
                'password' => Hash::make('password'),
                'role' => 'client',
                'status' => 'active'
            ]);

            Client::create([
                'user_id' => $clientUser->id,
                'phone' => "123456789{$i}",
                'shipping_address' => "Shipping Address {$i}",
                'billing_address' => "Billing Address {$i}"
            ]);
        }
    }
}
