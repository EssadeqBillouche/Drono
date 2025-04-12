<?php

namespace App\Domain\Product\ValueObjects;

use App\Domain\Exceptions\InvalidPriceException;

readonly class Price
{
    private function __construct(
        private float $amount,
        private string $currency = 'USD'
    ) {
        if ($amount < 0) {
            throw new InvalidPriceException('Price cannot be negative');
        }
    }

    public static function fromFloat(float $amount): self
    {
        return new self($amount);
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function equals(Price $other): bool
    {
        return $this->amount === $other->amount
            && $this->currency === $other->currency;
    }
}
