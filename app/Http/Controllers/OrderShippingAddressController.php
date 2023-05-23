<?php

namespace App\Http\Controllers;

use App\Models\OrderShippingAddress;
use App\Http\Requests\StoreOrderShippingAddressRequest;
use App\Http\Requests\UpdateOrderShippingAddressRequest;

class OrderShippingAddressController extends Controller
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
     * @param  \App\Http\Requests\StoreOrderShippingAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderShippingAddressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderShippingAddress  $orderShippingAddress
     * @return \Illuminate\Http\Response
     */
    public function show(OrderShippingAddress $orderShippingAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderShippingAddress  $orderShippingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderShippingAddress $orderShippingAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderShippingAddressRequest  $request
     * @param  \App\Models\OrderShippingAddress  $orderShippingAddress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderShippingAddressRequest $request, OrderShippingAddress $orderShippingAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderShippingAddress  $orderShippingAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderShippingAddress $orderShippingAddress)
    {
        //
    }
}
