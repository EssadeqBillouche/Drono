<?php

namespace App\Application\Orders\DTOs;

class AddOrderDTO
{
    private array $items;
    private string $shippingLatitude;
    private string $shippingLongitude;

    private int $clientId;
    private ?string $notes;

    public function __construct(
        array $items,
        string $shippingLatitude,
        string $shippingLongitude,
        int $clientId,
        ?string $notes = null
    ) {
        $this->items = $items;
        $this->shippingLongitude = $shippingLongitude;
        $this->shippingLatitude = $shippingLatitude;
        $this->clientId = $clientId;
        $this->notes = $notes;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getShippingAddress(): string
    {
        return $this->shippingAddress;
    }

    public function getBillingAddress(): string
    {
        return $this->billingAddress;
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }


}
