<?php

namespace App\Application\Auth\UseCase;

use App\Domain\Auth\Entities\Seller;
use App\Domain\Auth\Entities\User;
use App\Domain\Auth\Repositories\UserRepositoryInterface;

class GetsellerInfoUseCase
{
    public function __construct(
        private UserRepositoryInterface $sellerRepository
    ) {
    }

    public function execute(int $sellerId)
    {
        return $this->sellerRepository->getSellerById($sellerId);
    }

}
