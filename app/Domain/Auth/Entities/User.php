<?php
namespace App\Domain\Auth\Entities;

use App\Domain\Auth\ValueObjects\UserId;
use App\Domain\Auth\ValueObjects\Email;

abstract class User
{
    protected UserId $id;
    protected Email $email;
    protected string $password;
    protected string $name;
    protected string $profileImage; // Required for all roles

    public function __construct(UserId $id, Email $email, string $password, string $name, string $profileImage)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->profileImage = $profileImage;
    }

    abstract public function getRole(): string;

    public function verifyPassword(string $plainPassword): bool
    {
        return password_verify($plainPassword, $this->password);
    }

    public function getId(): UserId { return $this->id; }
    public function getEmail(): Email { return $this->email; }
    public function getName(): string { return $this->name; }
    public function getProfileImage(): string { return $this->profileImage; }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'email' => $this->email->value(),
            'password' => $this->password,
            'role' => $this->getRole(),
            'name' => $this->name,
            'profile_image' => $this->profileImage,
        ];
    }
}
