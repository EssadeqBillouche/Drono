<?php

namespace Tests\Unit;

use App\Application\Product\DTOs\AddProductDTO;
use App\Application\Product\UseCase\AddProduct;
use App\Domain\Product\Entities\Product;
use App\Domain\Product\Repositories\ProductRepositoryInterface;
use App\Domain\Product\ValueObjects\Price;
use App\Domain\Product\ValueObjects\Stock;
use App\Domain\Product\ValueObjects\Image;
use Tests\TestCase;

class AddProductTest extends TestCase
{
    public function test_it_creates_a_product_successfully()
    {
        // Arrange
        $dto = new AddProductDTO(
            sellerId: 1,
            categoryId: 1,
            name: 'Test Product',
            slug: 'test-product',
            description: 'Test Description',
            price: 99.99,
            stock: 10,
            isActive: true,
            images: '["image1.jpg"]',
            rating: 0.0,
            totalReviews: 0
        );

        // Create expected product with all required parameters
        $expectedProduct = new Product(
            id: 1,
            sellerId: 1,
            categoryId: 1,
            name: 'Test Product',
            slug: 'test-product',
            description: 'Test Description',
            price: new Price(99.99),
            stock: new Stock(10),
            isActive: true,
            images: new Image('["image1.jpg"]'),
            rating: 0.0,
            totalReviews: 0
        );

        // Create mock repository
        $repository = mock(ProductRepositoryInterface::class);
        $repository->shouldReceive('save')
            ->once()
            ->with(\Mockery::on(function ($product) {
                return $product instanceof Product
                    && $product->getName() === 'Test Product'
                    && $product->getPrice()->getValue() === 99.99;
            }))
            ->andReturn($expectedProduct);

        // Create use case with mock repository
        $useCase = new AddProduct($repository);

        // Act
        $result = $useCase->execute($dto);

        // Assert
        $this->assertInstanceOf(Product::class, $result);
        $this->assertEquals($expectedProduct->getId(), $result->getId());
        $this->assertEquals($expectedProduct->getName(), $result->getName());
        $this->assertEquals($expectedProduct->getPrice()->getValue(), $result->getPrice()->getValue());
        $this->assertEquals($expectedProduct->getStock()->getValue(), $result->getStock()->getValue());
    }
}
