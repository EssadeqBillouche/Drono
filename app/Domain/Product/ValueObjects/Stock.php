<?php

namespace App\Domain\Product\ValueObjects;


final class Stock
{
    private int $quantity;
    private int $minLimit;

    public function __construct(int $quantity, int $minLimit = 0)
    {
        if ($quantity < 0) {
            throw new \InvalidArgumentException('Stock cannot be negative');
        }
        $this->quantity = $quantity;
        $this->minLimit = $minLimit;
    }

    public function decrease(int $amount): Stock
    {
        if ($amount > $this->quantity) {
            throw new \InvalidArgumentException('Insufficient stock');
        }
        return new Stock($this->quantity - $amount, $this->minLimit);
    }

    public function isLow(): bool
    {
        return $this->quantity <= $this->minLimit;
    }
}
