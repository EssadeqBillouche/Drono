<?php

namespace App\Domain\Order\Entities;
class OrderItem
{
    private int $id;
    private int $productId;
    private string $productName;
    private int $quantity;
    private float $price;
    private float $total;

    public function __construct(
        int $productId,
        string $productName,
        int $quantity,
        float $price
    ) {
        if ($quantity <= 0) {
            throw new \InvalidArgumentException('Quantity must be greater than zero');
        }

        $this->productId = $productId;
        $this->productName = $productName;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->calculateTotal();
    }
    public function updateQuantity(int $newQuantity): void
    {
        if ($newQuantity <= 0) {
            throw new \InvalidArgumentException('Quantity must be greater than zero');
        }

        $this->quantity = $newQuantity;
        $this->calculateTotal();
    }

    private function calculateTotal(): void
    {
        $this->total = $this->price * $this->quantity;
    }

    // Getters
    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getTotal(): float
    {
        return $this->total;
    }
}
