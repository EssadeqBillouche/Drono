<?php

namespace App\Application\Auth\DTOs;

readonly class LoginUserDTO
{
    public function __construct( public readonly string $email, public readonly string $password )
    {}
}
