<?php

namespace Database\Factories;

use App\Infrastructure\Persistence\Models\Seller;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerFactory extends Factory
{
    protected $model = Seller::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'store_name' => $this->faker->company(),
            'store_category' => $this->faker->randomElement(Seller::STORE_CATEGORIES),
            'store_profile' => $this->faker->imageUrl(),
            'store_background_image' => $this->faker->imageUrl(),
            'store_address' => $this->faker->address(),
            'tax_id' => $this->faker->numberBetween(100000000, 999999999),
            'description' => $this->faker->paragraph(),
            'contact_phone' => $this->faker->phoneNumber()
        ];
    }
}
