<?php

namespace App\Http\Controllers;

use App\Models\OrderBillingAddress;
use App\Http\Requests\StoreOrderBillingAddressRequest;
use App\Http\Requests\UpdateOrderBillingAddressRequest;

class OrderBillingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderBillingAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderBillingAddressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderBillingAddress  $orderBillingAddress
     * @return \Illuminate\Http\Response
     */
    public function show(OrderBillingAddress $orderBillingAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderBillingAddress  $orderBillingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderBillingAddress $orderBillingAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderBillingAddressRequest  $request
     * @param  \App\Models\OrderBillingAddress  $orderBillingAddress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderBillingAddressRequest $request, OrderBillingAddress $orderBillingAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderBillingAddress  $orderBillingAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderBillingAddress $orderBillingAddress)
    {
        //
    }
}
