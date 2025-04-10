<?php

namespace App\Application\Auth\UseCase;

use App\Application\Auth\DTOs\RegisterClientDTO;
use App\Domain\Auth\Entities\Client;
use App\Domain\Auth\ValueObjects\Email;
use App\Domain\Auth\ValueObjects\UserId;
use App\Infrastructure\Persistence\DAOs\UserDAO;

class ClientRegisterUseCase
{
    private UserDAO $userDAO;

    public function __construct(UserDAO $userDAO)
    {
        $this->userDAO = $userDAO;
    }

    public function RegisterClient(RegisterClientDTO $dto): Client
    {
        $userId = new UserId(null);
        $email = new Email($dto->getEmail());
        $client = new Client(
            $userId,
            $email,
            $dto->getPassword(),
            $dto->getName(),
            null
        );
        $this->userDAO->createClient($client);
        return $client;
    }


}
