<?php

namespace App\Application\Orders\DTOs;

class AddOrderDTO
{
    private array $items;
    private float $shippingLatitude;
    private float $shippingLongitude;

    private int $clientId;
    private ?string $notes;

    public function __construct(
        array $items,
        float $shippingLatitude,
        float $shippingLongitude,
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

    public function getShippingLatitude()
    {
        return $this->shippingLatitude;
    }

    public function getShippingLongitude()
    {
        return $this->shippingLongitude;
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
