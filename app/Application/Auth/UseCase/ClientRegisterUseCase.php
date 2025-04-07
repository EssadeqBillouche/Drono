<?php

namespace App\Application\Auth\UseCase;

use App\Application\Auth\DTOs\RegisterClientDTO;
use App\Domain\Auth\Entities\Client;
use App\Domain\Auth\ValueObjects\Email;
use App\Domain\Auth\ValueObjects\UserId;
use App\Infrastructure\DAOs\UserDAO;

class ClientRegisterUseCase
{
    private UserDAO $userDAO;

    public function __construct(UserDAO $userDAO)
    {
        $this->userDAO = $userDAO;
    }

    public function RegisterClient(RegisterClientDTO $dto): Client
    {
        $userId = new UserId(null); // Assuming UserId can handle null and generate a new ID
        $email = new Email($dto->getEmail()); // Convert string to Value Object
        $client = new Client(
            $userId,
            $email,
            $dto->getPassword(), // Use the already hashed password from DTO
            $dto->getName(),
            null
        );

        $this->userDAO->createClient($client);
        return $client;
    }
}
