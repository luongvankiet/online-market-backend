<?php

namespace App\Actions\OrderActions;

use App\Models\Order;
use App\Models\OrderBillingAddress;

class StoreOrderBillingAddressAction
{
    public function __invoke(Order $order, array $orderBillingAddressData = []): ?OrderBillingAddress
    {
        $orderBillingAddress = new OrderBillingAddress();
        $orderBillingAddress->name = $orderBillingAddressData['name'] ?? '';
        $orderBillingAddress->phone = $orderBillingAddressData['phone'] ?? '';
        $orderBillingAddress->email = $orderBillingAddressData['email'] ?? '';
        $orderBillingAddress->address = $orderBillingAddressData['address'] ?? '';
        $orderBillingAddress->city = $orderBillingAddressData['city'] ?? '';
        $orderBillingAddress->state = $orderBillingAddressData['state'] ?? '';
        $orderBillingAddress->country = $orderBillingAddressData['country'] ?? '';
        $orderBillingAddress->postcode = $orderBillingAddressData['postcode'] ?? '1';

        $orderBillingAddress->order()->associate($order);
        $orderBillingAddress->save();

        return $orderBillingAddress;
    }
}
