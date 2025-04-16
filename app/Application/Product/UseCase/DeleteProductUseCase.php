<?php

namespace App\Application\Product\UseCase;

use App\Domain\Product\Repositories\ProductRepositoryInterface;
use DomainException;

class DeleteProductUseCase
{
    public function __construct(
        private readonly ProductRepositoryInterface $productDAO
    ) {}

    public function execute(int $productId): void
    {
        try {
            $product = $this->productDAO->findById($productId);

            if (!$product) {
                throw new DomainException("Product not found");
            }

            $this->productDAO->delete($productId);

        } catch (DomainException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new DomainException("Failed to delete product: " . $e->getMessage());
        }
    }
}
