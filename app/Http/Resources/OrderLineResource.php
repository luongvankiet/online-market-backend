<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderLineResource extends JsonResource
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
            'product_name' => $this->resource->product_name,
            'quantity' => $this->resource->quantity,
            'total_price' => $this->resource->total_price,
            'product_id' => $this->resource->product_id,
        ];

        if ($this->resource->relationLoaded('product')) {
            $resource['product'] = ProductResource::make($this->resource->product);
        }

        if ($this->resource->relationLoaded('order')) {
            $resource['order'] = OrderResource::make($this->resource->order);
        }

        return array_merge($resource, [
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ]);
    }
}
