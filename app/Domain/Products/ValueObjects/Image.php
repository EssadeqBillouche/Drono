<?php

declare(strict_types=1);

namespace App\Domain\Products\ValueObjects;

use InvalidArgumentException;

final class Image
{
    private string $value;

    public function __construct(string $images)
    {

        $this->value = $images;
    }

    public function value(): string
    {
        return $this->value;
    }
}
