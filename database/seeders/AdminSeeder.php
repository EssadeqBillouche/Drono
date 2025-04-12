<?php

namespace Database\Seeders;

use App\Infrastructure\Persistence\Models\User;
use App\Infrastructure\Persistence\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status' => 'active'
        ]);

        Admin::create([
            'user_id' => $adminUser->id,
            'permission_level' => 'super_admin',
            'department' => 'Management'
        ]);
    }
}
