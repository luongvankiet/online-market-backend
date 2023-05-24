<?php

namespace App\Http\Resources;

use App\Models\OrderBillingAddress;
use App\Models\OrderShippingAddress;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $resource = [
            'id' => $this->resource->id,
            'order_code' => $this->resource->order_code,
            'status' => $this->resource->status,
            'payment_method' => $this->resource->payment_method,
            'shipping_method' => $this->resource->shipping_method,
            'sub_total_price' => $this->resource->sub_total_price,
            'shipping_price' => $this->resource->shipping_price,
            'taxes' => $this->resource->taxes,
            'discount_price' => $this->resource->discount_price,
            'total_price' => $this->resource->total_price,
            'note' => $this->resource->note,
            'seller_id' => $this->resource->seller_id,
            'seller_name' => $this->resource->seller_name,
        ];

        if ($this->resource->relationLoaded('orderLines')) {
            $resource['order_lines'] = OrderLineResource::collection($this->resource->orderLines);
        }

        if ($this->resource->relationLoaded('orderBillingAddress')) {
            $resource['billing_address'] = OrderBillingAddressResource::make($this->resource->orderBillingAddress);
        }

        if ($this->resource->relationLoaded('orderShippingAddress')) {
            $resource['shipping_address'] = OrderShippingAddressResource::make($this->resource->orderShippingAddress);
        }

        return array_merge($resource, [
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ]);
    }
}
