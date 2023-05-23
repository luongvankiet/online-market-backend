<?php

namespace App\Actions\OrderActions;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderStatus;

class StoreOrderAction
{
    public function __invoke(StoreOrderRequest $request): ?Order
    {
        $latestOrder = Order::latest()->first();

        $order = new Order();

        $order->order_code = '#' . str_pad($latestOrder->id + 1, 5, "0", STR_PAD_LEFT);
        $order->status = OrderStatus::PENDING;
        $order->payment_method = $request->input('payment_method');
        $order->shipping_method = $request->input('shipping_method');
        $order->note = $request->input('note');
        $order->seller_id = $request->input('seller_id');
        $order->shipping_price = $request->input('shipping_price');

        $order->save();

        foreach ($request->input('order_lines') as $orderLine) {
            (new StoreOrderLineAction)($order, $orderLine);
        }

        (new StoreOrderBillingAddressAction)($order, $request->input('billing_address'));
        (new StoreOrderShippingAddressAction)($order, $request->input('shipping_address'));


        $order->sub_total_price = (new CalculatePriceAction)($order);
        $order->discount_price = 0;
        $order->total_price = $order->sub_total_price + $order->shipping_price - $order->discount_price;

        $order->save();

        return $order;
    }
}
