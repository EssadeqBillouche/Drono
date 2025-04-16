<?php

namespace App\Application\Product\DTOs;

readonly class AddProductDTO
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

    public function toJson(): string
    {
        return json_encode($this->images);
    }

    // Getters
    public function getSellerId(): int
    {
        return $this->sellerId;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function getImages(): string
    {
        return $this->images;
    }

    public function getImagesJson(): string
    {
        return $this->toJson();
    }
}
