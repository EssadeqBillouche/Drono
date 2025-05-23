<?php

namespace App\Application\Auth\DTOs;

use Illuminate\Support\Facades\Hash;

readonly class RegisterClientDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return Hash::make($this->password); // Fixed case sensitivity
    }

    public function getRole(): string
    {
        return 'client';
    }
}
