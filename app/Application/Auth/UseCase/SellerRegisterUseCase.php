<?php

namespace App\Application\Auth\UseCase;

use App\Application\Auth\DTOs\RegisterSellerDTO;
use App\Domain\Auth\Entities\Seller;
use App\Infrastructure\DAOs\UserDAO;

class SellerRegisterUseCase
{
    private UserDAO $userDAO;

    public function __construct(UserDAO $userDAO)
    {
        $this->userDAO = $userDAO;
    }
    public function registerSeller( RegisterSellerDTO $sellerDTO)
    {
        $seller = new Seller(null, $sellerDTO->email()->toString, $sellerDTO->password, $sellerDTO->fullName, $sellerDTO->storeName, $sellerDTO->storeProfileImage, $sellerDTO->storeBackgroundImage);
        $sellerCreated = $this->userDAO->createSeller($seller);
        return $sellerCreated;
    }


}
