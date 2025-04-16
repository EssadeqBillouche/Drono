<?php

declare(strict_types=1);

namespace App\Domain\Product\Entities;

use App\Domain\Product\ValueObjects\Stock;
use App\Domain\Product\ValueObjects\Image;
use App\Domain\Product\ValueObjects\Price;

class Product
{
    public function __construct(
        private ?int $id,
        private int $sellerId,
        private int $categoryId,
        private string $name,
        private string $slug,
        private string $description,
        private Price $price,
        private Stock $stock,
        private bool $isActive,
        private Image $images,
        private float $rating = 0.0,
        private int $totalReviews = 0
    ) {
        try {
            $this->validateName($name);
            $this->validateDescription($description);
        } catch (\Exception $e) {
            throw new \Exception('Product validation failed: ' . $e->getMessage());
        }
    }


    public function decreaseStock(int $quantity): bool
    {
        if ($this->stock->getValue() < $quantity) {
            return false;
        }
        $this->stock = new Stock($this->stock->getValue() - $quantity);
        return true;
    }

    public function isAvailable(): bool
    {
        return $this->isActive && $this->stock->getValue() > 0;
    }

    public function updateRating(float $newRating): void
    {
        $this->totalReviews++;
        $this->rating = (($this->rating * ($this->totalReviews - 1)) + $newRating)
            / $this->totalReviews;
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getSellerId(): int { return $this->sellerId; }
    public function getCategoryId(): int { return $this->categoryId; }
    public function getName(): string { return $this->name; }
    public function getSlug(): string { return $this->slug; }
    public function getDescription(): string { return $this->description; }
    public function getPrice(): Price { return $this->price; }
    public function getStock(): Stock { return $this->stock; }
    public function isActive(): bool { return $this->isActive; }
    public function getImages(): Image { return $this->images; }
    public function getRating(): float { return $this->rating; }
    public function getTotalReviews(): int { return $this->totalReviews; }

    private function validateName(string $name):string
    {
        return $name;
    }

    private function validateDescription(string $description): string
    {
        return $description;
    }
}
