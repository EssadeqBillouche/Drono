<?php

namespace App\Domain\Order\Repositories;

use App\Application\Orders\DTOs\AddOrderDTO;
use App\Domain\Order\Entities\Order;

interface OrderRepositoryInterface
{
    public function store( Order $order);

    public function update(Order $order, $id);

    public function findById($id);

    public function findByUserId($userId);

    public function findBySellerId($sellerId);

    public function findByClientId($clientId);


}
