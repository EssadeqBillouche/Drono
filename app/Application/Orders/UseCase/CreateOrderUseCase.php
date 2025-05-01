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
            shippingLongitude: $addOrderDTO->getShippingLongitude(),
            shippingLatitude: $addOrderDTO->getShippingLatitude());

        foreach ($addOrderDTO->getItems() as $item) {
            $order->addItem(new OrderItem( productId: $item['id'], productName: $item['name'], quantity: $item['quantity'], price: $item['price']));
        }
        $this->orderDAO->store( $order);

    }
}
