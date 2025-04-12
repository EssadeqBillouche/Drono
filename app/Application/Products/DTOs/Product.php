<?php

namespace App\Application\Products\DTOs;

readonly class Product
{
    public function __construct(
        public int $sellerId,
        public int $categoryId,
        public string $name,
        public string $description,
        public float $price,
        public int $stock,
        public bool $isActive = true,
        public array $images = [],
        public float $rating = 0.00,
        public int $totalReviews = 0
    ) {}
}
