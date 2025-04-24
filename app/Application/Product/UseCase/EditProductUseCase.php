<?php
namespace App\Application\Product\UseCase;

use App\Domain\Product\Repositories\ProductRepositoryInterface;

class EditProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {}

    public function execute(int $productId, ): void
    {
        $product = $this->productRepository->findById($productId);
        if ($product){
            //update product properties using data
            $this->productRepository->save($product);
        }
    }
}
