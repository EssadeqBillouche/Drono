<?php

namespace App\Domain\Auth\Entities;

use App\Domain\Auth\ValueObjects\Email;
use App\Domain\Auth\ValueObjects\UserId;

class Client extends User
{

    public function __construct( UserId $id, Email $email, $password, $name, $profileImage)
    {
        parent::__construct( $id, $email, $password, $name, $profileImage);
    }

    public function getRole(): string
    {
        return 'Client';
    }
}
