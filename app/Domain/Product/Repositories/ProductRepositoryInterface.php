<?php

declare(strict_types=1);

namespace App\Domain\Product\Repositories;

use App\Domain\Product\Entities\Product;

interface ProductRepositoryInterface
{
//    public function all();
    public function save(Product $product): Product;
    public function delete(int $productId) : bool;
    public function findById(int $productId) : ?Product;

    public function update(Product $product, int $prouductId): Product;

    public function all();
}
