<?php

namespace App\Application\Product\UseCase;

use App\Domain\Product\Repositories\ProductRepositoryInterface;

class GetProductByCategoryIdUseCase
{
    public function __construct(
        private readonly ProductRepositoryInterface $productDAO
    ) {
    }

    public function execute(int $categoryId)
    {
        return $this->productDAO->getProductsByCategoryId($categoryId);
    }
}
