<?php

namespace App\Infrastructure\Persistence\DAOs;

use App\Domain\Auth\Entities\Client;
use App\Domain\Auth\Entities\Seller;
use App\Domain\Auth\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Models\User;
use mysql_xdevapi\Exception;

class UserDAO implements UserRepositoryInterface
{
    public function createClient(Client $client): ?User
    {
        $user = User::create([
            'email' => $client->getEmail()->toString(),
            'password' => $client->getPassword(),
            'name' => $client->getName(),
            'role' => 'client',
            'status' => 'active'
        ]);

        $user->client()->create([
            'phone' => '0684838438',
            'shipping_address' => '293843234',
            'billing_address' => '5435008954'
        ]);
        return $user;
    }

    public function createSeller(Seller $seller): ?User{


        $sellerCreated = User::create([
            'email' => $seller->getEmail()->toString(),
            'password' => $seller->getPassword(),
            'name' => $seller->getName(),
            'role' => 'seller',
            'status' => 'active',
            'profile_image' => $seller->getProfileImage(),
        ]);
        $sellerCreated->seller()->create([
            'store_name' => $seller->getStoreName(),
            'store_background_image' => $seller->getStoreBackgroundImage(),
            'store_address' => 'fsdlfsdlsfd',
            'store_profile' => $seller->getStoreImage(),
            'contact_phone' => '0684838438',
            'description' => 'fjskdfskld',
            'tax_id' => '123456789'
        ]);
//        dd($sellerCreated);
        return $sellerCreated;
    }

    public function findUserByEmail(string $email): ?User
    {
        return User::find($email)->first();
    }


}
