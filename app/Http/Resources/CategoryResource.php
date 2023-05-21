<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CategoryResource extends JsonResource
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
            'seller_id' => $this->resource->seller_id,
            'image' => $this->resource->image
                ? asset("/images/{$this->resource->image}")
                : null,
            'products_count' => $this->resource->products_count,
        ];

        if ($this->resource->relationLoaded('parent')) {
            $resource['parent'] = $this->resource->parent
                ? CategoryResource::make($this->resource->parent)
                : null;
        }

        if ($this->resource->relationLoaded('children')) {
            $resource['children'] = !empty($this->resource->children)
                ? CategoryResource::collection($this->resource->children)
                : [];
        }

        return array_merge($resource, [
            'published_at' => $this->resource->published_at,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ]);
    }
}
