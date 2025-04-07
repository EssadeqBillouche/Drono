<?php

namespace App\Domain\Auth\ValueObjects;



class Email
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }
    public function toString(): string
    {
        return $this->value; // Email is already a string, but this ensures consistency
    }

}
