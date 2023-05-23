<?php

namespace App\Actions\OrderActions;

use App\Models\Order;
use App\Models\OrderShippingAddress;

class StoreOrderShippingAddressAction
{
    public function __invoke(Order $order, array $orderShippingAddressData = []): ?OrderShippingAddress
    {
        $orderShippingAddress = new OrderShippingAddress();
        $orderShippingAddress->name = $orderShippingAddressData['name'] ?? '';
        $orderShippingAddress->phone = $orderShippingAddressData['phone'] ?? '';
        $orderShippingAddress->email = $orderShippingAddressData['email'] ?? '';
        $orderShippingAddress->address = $orderShippingAddressData['address'] ?? '';
        $orderShippingAddress->city = $orderShippingAddressData['city'] ?? '';
        $orderShippingAddress->state = $orderShippingAddressData['state'] ?? '';
        $orderShippingAddress->country = $orderShippingAddressData['country'] ?? '';
        $orderShippingAddress->postcode = $orderShippingAddressData['postcode'] ?? '1';

        $orderShippingAddress->order()->associate($order);
        $orderShippingAddress->save();

        return $orderShippingAddress;
    }
}
