<?php
namespace App\Application\Auth\DTOs;

class RegisterUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role,
        public string $street,
        public string $city,
        public string $country,
        public string $zip
    ) {}
}
