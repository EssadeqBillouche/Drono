<?php

namespace App\Infrastructure\Persistence\DAOs;

use App\Application\Orders\DTOs\AddOrderDTO;
use App\Domain\Order\Entities\Order;
use App\Domain\Order\Repositories\OrderRepositoryInterface;
use App\Infrastructure\Persistence\Models\Order as OrderModel;
use App\Infrastructure\Persistence\Models\OrderItem as OrderItemModel;
use App\Infrastructure\Persistence\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderDAO implements OrderRepositoryInterface
{
    public function store(Order $order)
    {
        DB::beginTransaction();

        try {
            // Create order
            $orderModel = new OrderModel([
                'client_id' => $order->getClientId(),
                'order_number' => $order->getOrderNumber(),
                'status' => $order->getStatus(),
                'payment_status' => 'pending',
                'shipping_latitude' => $order->getShippingLatitude(),
                'shipping_longitude' => $order->getShippingLongitude(),
                'total' => $order->getTotal()
            ]);

            $orderModel->save();

            // Process each order item
            foreach ($order->getItems() as $item) {
                $product = Product::findOrFail($item->getProductId());

                // Check stock availability
                if ($product->stock < $item->getQuantity()) {
                    throw new \RuntimeException("Insufficient stock for product: {$product->name}");
                }

                // Create order item
                $orderItemModel = new OrderItemModel([
                    'product_id' => $item->getProductId(),
                    'product_name' => $item->getProductName(),
                    'quantity' => $item->getQuantity(),
                    'price' => $item->getPrice(),
                    'total' => $item->getTotal()
                ]);

                $orderModel->items()->save($orderItemModel);

                // Update product stock
                if (!$product->decreaseStock($item->getQuantity())) {
                    throw new \RuntimeException("Failed to update stock for product: {$product->name}");
                }
            }

            DB::commit();
            return $orderModel->id;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return $orderModel->id;
    }
    public function update(Order $order, $id){}
}
