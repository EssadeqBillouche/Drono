<?php

namespace App\Application\Auth\UseCase;

use App\Application\Auth\DTOs\RegisterSellerDTO;
use App\Domain\Auth\Entities\Seller;
use App\Domain\Auth\ValueObjects\Email;
use App\Domain\Auth\ValueObjects\UserId;
use App\Infrastructure\Persistence\DAOs\UserDAO;

class SellerRegisterUseCase
{
    private UserDAO $userDAO;

    public function __construct(UserDAO $userDAO)
    {
        $this->userDAO = $userDAO;
    }
    public function registerSeller( RegisterSellerDTO $sellerDTO)
    {
        try {
            $userId = new UserId(null);
            $email = new Email($sellerDTO->email);
            $seller = new Seller( $userId, $email, $sellerDTO->password, $sellerDTO->fullName, $sellerDTO->storeName, $sellerDTO->storeProfileImage, $sellerDTO->storeBackgroundImage);
            return $this->userDAO->createSeller($seller);
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }


}
