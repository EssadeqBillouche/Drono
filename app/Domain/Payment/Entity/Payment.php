<?php

namespace App\Domain\Payment\Entity;

class Payment
{
    private string $id;
    private float $amount;
    private string $currency;
    private string $status;
    private string $paymentMethod;
    private ?string $orderId;
    private \DateTimeImmutable $createdAt;

    public function __construct(
        string $id,
        float $amount,
        string $currency,
        string $status,
        string $paymentMethod,
        ?string $orderId = null
    ) {
        $this->id = $id;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->status = $status;
        $this->paymentMethod = $paymentMethod;
        $this->orderId = $orderId;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function isSuccessful(): bool
    {
        return $this->status === 'succeeded';
    }

    public function requiresAction(): bool
    {
        return $this->status === 'requires_action';
    }
}
