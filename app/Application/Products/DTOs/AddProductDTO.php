<?php

namespace App\Application\Products\DTOs;

final class AddProductDTO
{
    public function __construct(
        private readonly int $sellerId,
        private readonly int $categoryId,
        private readonly string $name,
        private readonly string $description,
        private readonly float $price,
        private readonly int $stock,
        private readonly array $images,
        private readonly bool $isActive = true
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            sellerId: $data['seller_id'],
            categoryId: $data['category_id'],
            name: $data['name'],
            description: $data['description'],
            price: (float) $data['price'],
            stock: (int) $data['stock'],
            images: $data['images'] ?? [],
            isActive: $data['is_active'] ?? true
        );
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

    public function getImages(): array
    {
        return $this->images;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function toArray(): array
    {
        return [
            'seller_id' => $this->sellerId,
            'category_id' => $this->categoryId,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'images' => $this->images,
            'is_active' => $this->isActive,
        ];
    }
}

