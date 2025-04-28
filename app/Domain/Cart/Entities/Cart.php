<?php

namespace App\Domain\Cart\Entity;

class Cart
{
    private array $items = [];

    public function addItem(CartItem $item): void
    {
        $this->items[] = $item;
    }

    public function removeItem(int $itemId): void
    {
        $this->items = array_filter(
            $this->items,
            fn($item) => $item->getId() !== $itemId
        );
    }

    public function updateQuantity(int $itemId, int $quantity): void
    {
        foreach ($this->items as $item) {
            if ($item->getId() === $itemId) {
                $item->setQuantity($quantity);
                break;
            }
        }
    }

    public function getTotal(): float
    {
        return array_reduce(
            $this->items,
            fn($total, $item) => $total + $item->getSubtotal(),
            0
        );
    }

    public function clear(): void
    {
        $this->items = [];
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
