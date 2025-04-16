<?php

namespace App\Domain\Product\ValueObjects;

use InvalidArgumentException;

final readonly class Stock
{
    private int $quantity;

    public function __construct(int $quantity)
    {
        if ($quantity < 0) {
            throw new InvalidArgumentException('Stock quantity cannot be negative');
        }
        $this->quantity = $quantity;
    }

    public function decrease(int $amount): self
    {
        if ($amount > $this->quantity) {
            throw new InvalidArgumentException('Not enough stock');
        }
        return new self($this->quantity - $amount);
    }

    public function getValue(): int
    {
        return $this->quantity;
    }
}


