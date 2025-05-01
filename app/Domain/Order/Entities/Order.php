<?php

namespace App\Domain\Order\Entities;

class Order
{
    private int $id;
    private int $clientId;
    private string $orderNumber;
    private string $status;
    private string $paymentStatus;
    private float $total;
    private array $items;
    private float $shippingLongitude;
    private float $shippingLatitude;
    private string $createdAt;

    // Basic status constants
    public const STATUS_PENDING = 'pending';
    public const STATUS_PAID = 'paid';
    public const STATUS_SHIPPED = 'shipped';
    public const STATUS_DELIVERED = 'delivered';
    public const STATUS_CANCELLED = 'cancelled';

    public function __construct(
        $clientId,
        $shippingLongitude,
        $shippingLatitude
    ) {
        $this->clientId = $clientId;
        $this->shippingLongitude = $shippingLongitude;
        $this->shippingLatitude = $shippingLatitude;
        $this->orderNumber = $this->generateOrderNumber();
        $this->status = self::STATUS_PENDING;
        $this->paymentStatus = 'pending';
        $this->total = 0;
        $this->items = [];
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    private function generateOrderNumber(): string
    {
        return 'ORD-' . date('Ymd') . '-' . rand(1000, 9999);
    }

    public function addItem(OrderItem $item): void
    {
        $this->items[] = $item;
    }

    public function removeItem(int $itemIndex): void
    {
        if (isset($this->items[$itemIndex])) {
            unset($this->items[$itemIndex]);
            $this->items = array_values($this->items); // Reindex array
            $this->calculateTotal();
        }
    }

    private function calculateTotal(): void
    {
        $this->total = 0;
        foreach ($this->items as $item) {
            $this->total += $item->getTotal();
        }
    }

    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }

    public function getShippingLongitude(): float
    {
        return $this->shippingLongitude;
    }

    public function getShippingLatitude(): float
    {
        return $this->shippingLatitude;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function updateStatus(string $newStatus): void
    {
        $validStatuses = [
            self::STATUS_PENDING,
            self::STATUS_PAID,
            self::STATUS_SHIPPED,
            self::STATUS_DELIVERED,
            self::STATUS_CANCELLED
        ];

        if (!in_array($newStatus, $validStatuses)) {
            throw new \InvalidArgumentException('Invalid status');
        }

        $this->status = $newStatus;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
