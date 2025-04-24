<?php

namespace App\Application\Product\UseCase;

use App\Domain\Product\Repositories\ProductRepositoryInterface;

class GetProductUseCase
{
    private ProductRepositoryInterface $productRepository;


    public function __construct(ProductRepositoryInterface $productRepository){
        $this->productRepository = $productRepository;
    }


    public function getAllProduct(){
        return $this->productRepository->all();
    }


}
