<?php

namespace App\Domain\Auth\ValueObjects;

class Role
{
    private string $value;

    public function __construct(string $value){

        if(empty($value)){
            throw new \InvalidArgumentException('Invalid Role.');
        }
        $this->value = $value;
    }
}
