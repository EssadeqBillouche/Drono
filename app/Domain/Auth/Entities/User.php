<?php

namespace App\Domain\Auth\Entities;

use App\Domain\Auth\ValueObjects\Email;
use App\Domain\Auth\ValueObjects\UserId;
use App\Domain\Auth\Enums\Role;

abstract class User
{
    protected UserId $id;
    protected Email $email;
    protected string $password;
    protected string $name;
    protected ?string $profileImage;

    public function __construct(UserId $id, Email $email, string $password, string $name, ?string $profileImage = null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->profileImage = $profileImage;
    }

    abstract public function getRole(): string;

    // Common getters
    public function getId(): UserId { return $this->id; }
    public function getEmail(): Email { return $this->email; }
    public function getName(): string { return $this->name; }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function getProfileImage(): ?string { return $this->profileImage; }
}
