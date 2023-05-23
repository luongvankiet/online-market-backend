<?php

namespace App\Actions\OrderActions;

use App\Models\Order;

class CalculatePriceAction
{
    public function __invoke(Order $order): int
    {
        $orderLines = $order->orderLines;

        if (empty($orderLines)) {
            return 0;
        }

        $sum = 0;

        foreach ($orderLines as $orderLine) {
            $sum += $orderLine->total_price;
        }

        return $sum;
    }
}
