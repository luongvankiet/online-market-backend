<?php

namespace App\Http\Resources;

use App\Models\CategoryProduct;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'quantity' => $this->resource->quantity,
            'status' => $this->resource->status,
            'status_name' => $this->resource->status_name,
            'status_color' => $this->resource->status_color,
            'product_code' => $this->resource->product_code,
            'product_sku' => $this->resource->product_sku,
            'regular_price' => $this->resource->regular_price,
            'sale_price' => $this->resource->sale_price,
            'unit' => $this->resource->unit,
            'category_id' => $this->resource->category_id,
        ];

        if ($this->resource->relationLoaded('category')) {
            $resource['category'] = ProductResource::make($this->resource->category);
        }

        return array_merge($resource, [
            'published_at' => $this->resource->published_at,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ]);
    }
}
