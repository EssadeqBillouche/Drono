<?php

namespace App\Domain\Auth\ValueObjects;

class UserId
{
    private ?int $value;

    public function __construct(?int $value)
    {
        $this->value = $value;
    }
    public function toString(): ?string
    {
        return $this->value; // Email is already a string, but this ensures consistency
    }

}
