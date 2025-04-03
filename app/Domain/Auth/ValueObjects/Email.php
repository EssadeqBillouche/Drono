<?php

namespace App\Domain\Auth\ValueObjects;

use http\Exception\InvalidArgumentException;

class Email
{
    private string $value;

    public function __construct(string $value)
    {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            throw new InvalidArgumentException('Invalid Email.');
        }
        $this->value = $value;
    }

}
