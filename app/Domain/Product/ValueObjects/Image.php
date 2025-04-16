<?php

declare(strict_types=1);

namespace App\Domain\Product\ValueObjects;

use Exception;
use InvalidArgumentException;

final class Image
{
    private string $value;

    public function __construct(string $image)
    {
        $this->validate($image);
        $this->value = $image;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @throws Exception
     */
    private function validate(string $image): void
    {
        try {
            if (empty($image)) {
                throw new \InvalidArgumentException('Image cannot be empty');
            }
        } catch (Exception $e) {
            throw new Exception('Image validation failed: ' . $e->getMessage());
        }
    }
}
