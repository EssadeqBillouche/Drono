<?php

namespace App\Application\Product\DTOs;

class EditProductDTO
{
    public function __construct(
        public int $sellerId,
        public int $categoryId,
        public string $name,
        public ?string $slug,
        public string $description,
        public float $price,
        public int $stock,
        public bool $isActive,
        public string $images,
        public float $rating = 0.0,
        public int $totalReviews = 0
    ) {}

}
