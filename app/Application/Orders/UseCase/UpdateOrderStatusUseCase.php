<?php

namespace App\Application\Orders\UseCase;



use App\Domain\Order\Repositories\OrderRepositoryInterface;

class UpdateOrderStatusUseCase
{
    private OrderRepositoryInterface $orderRepository;
    private NotificationService $notificationService;

    public function __construct(OrderRepository $orderRepository, NotificationService $notificationService)
    {
        $this->orderRepository = $orderRepository;
        $this->notificationService = $notificationService;
    }

    public function execute(int $orderId, string $status, int $sellerId)
    {
        $order = $this->orderRepository->findById($orderId);

        if (!$order || $order->seller_id !== $sellerId) {
            throw new \Exception('Unauthorized to update this order');
        }

        $this->orderRepository->updateStatus($orderId, $status);
        $this->notificationService->notifyOrderStatusUpdated($orderId, $status);

        return true;
    }
}
