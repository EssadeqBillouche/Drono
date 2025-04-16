<?php

namespace Database\Factories\Infrastructure\Persistence\Models;

use App\Infrastructure\Persistence\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'role' => 'seller',
            'status' => 'active',
            'profile_image' => $this->faker->imageUrl(),
            'remember_token' => Str::random(10)
        ];
    }
    protected static function newFactory()
    {
        return \Database\Factories\Infrastructure\Persistence\Models\UserFactory::new();
    }
}
