<?php

namespace Database\Factories;

use App\Infrastructure\Persistence\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'slug' => fn (array $attributes) => Str::slug($attributes['name']),
            'description' => $this->faker->sentence(),
            'is_active' => true
        ];
    }
}
