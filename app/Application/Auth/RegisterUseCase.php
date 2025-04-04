<?php
namespace App\Application\Auth;

use App\Application\Auth\DTOs\RegisterUserDTO;
use App\Domain\Auth\Entities\User;
use App\Domain\Auth\ValueObjects\Address;
use App\Domain\Auth\ValueObjects\UserId;
use App\Domain\Auth\ValueObjects\Email;
use App\Domain\Auth\ValueObjects\Role;
use App\Infrastructure\Persistence\DAOs\UserDAO;
use Illuminate\Support\Facades\Hash;

class RegisterUseCase
{
    private UserDAO $userDAO;

    public function __construct(UserDAO $userDAO)
    {
        $this->userDAO = $userDAO;
    }

    public function execute(RegisterUserDTO $dto): User
    {
        $user = new User(
            id: new UserId(uniqid('USR-')),
            email: new Email($dto->email),
            password: Hash::make($dto->password),
            role: new Role($dto->role),
            name: $dto->name, address: new Address(street: $dto->street, city: $dto->city, country: $dto->country,zip: $dto->zip)
        );

        $this->userDAO->create($user);
        return $user;
    }
}
