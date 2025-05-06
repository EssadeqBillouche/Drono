<?php

namespace App\Application\Orders\UseCase;


use App\Domain\Order\Repositories\OrderRepositoryInterface;

class GetUserOrdersUseCase
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(int $userId)
    {
        return $this->orderRepository->findByUserId($userId);
    }
}
