<?php

namespace App\Infrastructure\DAOs;

use App\Domain\Auth\Entities\Client;
use App\Domain\Auth\Entities\Seller;
use App\Infrastructure\Models\User as User;

class UserDAO
{
    public function createClient(Client $client): ?User
    {
        return User::create([
            'email' => $client->getEmail()->toString(),
            'password' => $client->getPassword(),
            'name' => $client->getName(),
            'role' => $client->getRole(),
            'status' => 'active'
        ]);
    }
    public function createSeller( Seller $seller): ?User
    {
        return User::create([
            'email' => $seller->getEmail()->toString(),
            'password' => $seller->getPassword(),
            'store_name' => $seller->getName(),
            'role' => $seller->getRole(),
            'status' => 'active',
            'profile_image' => $seller->getProfileImage(),
            'store_background_image' => $seller->getStoreBackgroundImage()
        ]);
    }
}
