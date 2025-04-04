<?php

namespace App\Application\Auth\DTOs;

class LoginUserDTO
{
    public function __construct(public string $email, public string $password)
    {}

}
