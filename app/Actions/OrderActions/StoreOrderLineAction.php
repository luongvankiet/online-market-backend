<?php

namespace App\Actions\OrderActions;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use RuntimeException;

class StoreOrderLineAction
{
    public function __invoke(Order $order, array $orderLineData = []): ?OrderLine
    {
        if (!$orderLineData || !$orderLineData['product_id']) {
            throw new RuntimeException('No product found!');
        }

        $orderLine = new OrderLine();
        $product = Product::find($orderLineData['product_id']);

        if (!$product) {
            throw new RuntimeException('No product found!');
        }

        $orderLine->product_name = $product->name;
        $orderLine->quantity = $orderLineData['quantity'] ?? 1;
        $orderLine->total_price = $product->sale_price * $orderLine->quantity;

        $orderLine->order()->associate($order);
        $orderLine->product()->associate($product);
        $orderLine->save();

        return $orderLine;
    }
}
