<?php

namespace App\Http\Controllers;

use App\Actions\OrderActions\StoreOrderAction;
use App\Http\QueryFilters\OrderQueryFilter;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(
            OrderQueryFilter::make(
                Order::query()->with(['orderLines' => function ($orderLineQuery) {
                    return $orderLineQuery->with('product');
                }, 'orderBillingAddress', 'orderShippingAddress'])
            )
        );
    }

    public function store(
        StoreOrderRequest $request,
        StoreOrderAction $storeOrderAction
    ) {
        $order = ($storeOrderAction)($request);
        return OrderResource::make(
            $order->load(['orderLines' => function ($orderLineQuery) {
                return $orderLineQuery->with('product');
            }, 'orderBillingAddress', 'orderShippingAddress'])
        );
    }

    public function show(Order $order)
    {
        //
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
