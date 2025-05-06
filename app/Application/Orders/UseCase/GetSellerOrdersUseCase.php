<?php

namespace App\Application\Orders\UseCase;

use App\Domain\Repositories\OrderRepository;

class GetSellerOrdersUseCase
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(int $sellerId)
    {
        return $this->orderRepository->findBySellerId($sellerId);
    }
}
