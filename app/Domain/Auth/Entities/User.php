<?php

namespace App\Domain\Auth\Entities;

use App\Domain\Auth\ValueObjects\Address;
use App\Domain\Auth\ValueObjects\Email;
use App\Domain\Auth\ValueObjects\Role;
use App\Domain\Auth\ValueObjects\UserId;

class User
{
    private UserId $id;
    private Email $email;
    private string $password;
    private Role $role;
    private string $name;
    private Address $address;

    public function __construct(UserId $id, Email $email, string $password, Role $role, string $name, Address $address)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->name = $name;
        $this->address = $address;
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function getName(): string
    {
        return $this->name;
    }


}
