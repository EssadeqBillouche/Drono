<?php

declare(strict_types=1);

namespace App\Domain\Product\Repositories;



use App\Domain\Product\Entities\Product;

interface ProductRepositoryInterface
{
    public function findById(int $id): ?Product;
    public function save(Product $product): void;
    public function delete(int $id): void;
    public function findByCategoryId(int $categoryId): array;
    public function findBySellerId(int $sellerId): array;
    public function updateStock(int $id, int $quantity): void;
}
