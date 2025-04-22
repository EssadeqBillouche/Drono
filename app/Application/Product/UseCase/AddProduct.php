<?php

namespace App\Application\Product\UseCase;

use App\Application\Product\DTOs\AddProductDTO;
use App\Domain\Product\Entities\Product;
use App\Domain\Product\ValueObjects\Price;
use App\Domain\Product\ValueObjects\Stock;
use App\Domain\Product\ValueObjects\Image;
use App\Domain\Product\Repositories\ProductRepositoryInterface;

class AddProduct
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {}

    /**
     * @throws \Exception
     */
    public function execute(AddProductDTO $dto): Product
    {
        try {
            $price = new Price($dto->getPrice());
            $stock = new Stock($dto->getStock());
            $image = new Image($dto->getImages());

            $product = new Product(
                id: null,
                sellerId: $dto->getSellerId(),
                categoryId: $dto->getCategoryId(),
                name: $dto->getName(),
                slug: $dto->getSlug(),
                description: $dto->getDescription(),
                price: $price,
                stock: $stock,
                isActive: $dto->getIsActive(),
                images: $image,
                rating: $dto->rating,
                totalReviews: $dto->totalReviews
            );


            return $this->productRepository->save($product);
        } catch (\Exception $e) {
            throw new \Exception('Product creation failed: ' . $e->getMessage());
        }
    }



}
