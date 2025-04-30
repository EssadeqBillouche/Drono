<?php

namespace App\Infrastructure\Persistence\DAOs;

use App\Application\Orders\DTOs\AddOrderDTO;
use App\Domain\Order\Entities\Order;
use App\Domain\Order\Repositories\OrderRepositoryInterface;

class OrderDAO implements OrderRepositoryInterface
{
    public function store(Order $order){}
    public function update(Order $order, $id){}
}
