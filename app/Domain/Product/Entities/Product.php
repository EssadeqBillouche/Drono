<?php

declare(strict_types=1);

namespace App\Domain\Product\Entities;



use App\Domain\Products\ValueObjects\Image;
use App\Domain\Products\ValueObjects\Money;
use App\Domain\Products\ValueObjects\Stock;

class Product
{
    private ?int $id;
    private string $name;
    private string $description;
    private Money $price;          // Value Object because of currency and formatting
    private Stock $stock;          // Value Object because of business rules
    private bool $isActive;        // Simple boolean, no need for Value Object
    private Image $images;        // Value Object for validation and manipulation
    private float $rating;         // Simple float, no special rules
    private int $totalReviews;     // Simple counter, no special rules

    public function __construct(
        ?int $id,
        string $name,
        string $description,
        Money $price,
        Stock $stock,
        bool $isActive,
        Image $images,
        float $rating = 0.0,
        int $totalReviews = 0
    ) {
        $this->validateName($name);        // Basic validation in constructor
        $this->validateDescription($description);

        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->isActive = $isActive;
        $this->images = $images;
        $this->rating = $rating;
        $this->totalReviews = $totalReviews;
    }

    private function validateName(string $name): void
    {
        if (empty($name) || strlen($name) > 255) {
            throw new \InvalidArgumentException('Invalid product name');
        }
    }

    private function validateDescription(string $description): void
    {
        if (strlen($description) > 100) {
            throw new \InvalidArgumentException('Description too long');
        }
    }

    public function updateStock(int $quantity): void
    {
        $this->stock = $this->stock->decrease($quantity);
    }

    public function updatePrice(Money $newPrice): void
    {
        $this->price = $newPrice;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }

    public function getStock(): Stock
    {
        return $this->stock;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function getImages(): Image
    {
        return $this->images;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getTotalReviews(): int
    {
        return $this->totalReviews;
    }

}
