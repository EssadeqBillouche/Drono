<?php

namespace App\Application\Orders\UseCase;

use App\Domain\Repositories\OrderRepository;

class GetOrderByIdUseCase
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(int $orderId, int $userId, string $role)
    {
        $order = $this->orderRepository->findById($orderId);

        if (!$order) {
            return null;
        }

        // Verify user has permission to view this order
        if ($role === 'client' && $order->user_id !== $userId) {
            throw new \Exception('Unauthorized access to order');
        }

        if ($role === 'seller' && $order->seller_id !== $userId) {
            throw new \Exception('Unauthorized access to order');
        }

        return $order;
    }
}
