<?php

namespace App\Domain\Auth\Repositories;

use App\Domain\Auth\Entities\Client;
use App\Domain\Auth\Entities\Seller;
use App\Infrastructure\Persistence\Models\User;

interface UserRepositoryInterface
{
    public function createClient(Client $client): ?User;
    public function createSeller(Seller $seller): ?User;
    public function findUserByEmail(string $email): ?User;
}
