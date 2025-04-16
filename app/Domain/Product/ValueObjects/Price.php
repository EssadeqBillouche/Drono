<?php

namespace App\Domain\Product\ValueObjects;



use mysql_xdevapi\Exception;

final readonly class Price
{
    public function __construct(
        private float $amount,
        private string $currency = 'USD'
    ) {
        if ($amount < 0) {
            throw new Exception('Price cannot be negative');
        }
    }
    public function getValue(){
        return $this->amount;
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
