<?php

namespace App\Domain\Products\ValueObjects;
final class Price
{
    private float $amount;
    private string $currency;

    public function __construct(float $amount, string $currency = 'USD')
    {
        if ($amount < 0) {
            throw new \InvalidArgumentException('Amount cannot be negative');
        }
        $this->amount = round($amount, 2);
        $this->currency = $currency;
    }

    public function add(Money $other): Money
    {
        if ($this->currency !== $other->currency) {
            throw new \InvalidArgumentException('Cannot add different currencies');
        }
        return new Money($this->amount + $other->amount, $this->currency);
    }

    public function format(): string
    {
        return number_format($this->amount, 2) . ' ' . $this->currency;
    }
}
