<?php

namespace App\Domain\Auth\Entities;

use App\Domain\Auth\ValueObjects\Roles;
use App\Domain\Auth\ValueObjects\UserId;
use App\Domain\Auth\ValueObjects\Email;

class Client extends User
{


    public function __construct(UserId $id, Email $email, string $password, string $name, ?string $profileImage)
    {
        parent::__construct($id, $email, $password, $name, $profileImage);
    }

    public function getRole(): string
    {
        return Roles::CLIENT;
    }
}
