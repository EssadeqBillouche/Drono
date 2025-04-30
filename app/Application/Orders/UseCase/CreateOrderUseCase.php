<?php

namespace App\Application\Orders\UseCase;

use App\Application\Orders\DTOs\AddOrderDTO;
use App\Domain\Order\Entities\Order;
use App\Domain\Order\Entities\OrderItem;
use App\Domain\Order\Repositories\OrderRepositoryInterface;
use PhpYacc\Lalr\Item;

class CreateOrderUseCase
{
    private $orderDAO;
    public function __construct( OrderRepositoryInterface $orderDAO){
        $this->orderDAO = $orderDAO;
    }

    public function execute(AddOrderDTO $addOrderDTO){

        $order = new Order( clientId: $addOrderDTO->getClientId(),
            shippingLatitude:  $addOrderDTO->getShippingLatitude(),
        shippingLongitude: $addOrderDTO->getShippingLongitude());

        foreach ($addOrderDTO->getItems() as $item) {
            $order->addItem(new OrderItem($item['id'], $item['name'], $item['price'], $item['quantity']));
        }
        dd($order);


    }
}
