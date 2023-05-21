<?php

namespace App\Actions\ProductActions;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;

class StoreProductAction
{
    public function __invoke(StoreProductRequest $storeProductRequest): Product
    {
        $product = new Product();

        $product->name = $storeProductRequest->input('name');
        $product->description = $storeProductRequest->input('description');
        $product->product_sku = $storeProductRequest->input('product_sku');
        $product->product_code = $storeProductRequest->input('product_code');
        $product->status = $storeProductRequest->input('status');
        $product->regular_price = $storeProductRequest->input('regular_price');
        $product->sale_price = $storeProductRequest->input('sale_price');
        $product->quantity = $storeProductRequest->input('quantity');
        $product->unit = $storeProductRequest->input('unit');
        $product->seller_id = $storeProductRequest->input('seller_id');
        $product->published_at =  $storeProductRequest->input('published_at');

        if ($storeProductRequest->filled('category_id')) {
            $categoryId = $storeProductRequest->input('category_id');
            $category = Category::find($categoryId);

            if ($category) {
                $product->category()->associate($category);
            }
        }

        if ($storeProductRequest->hasFile('image')) {
            $image_name = time() . '.' . $storeProductRequest->file('image')->extension();
            $storeProductRequest->file('image')->move(public_path('storage/images'), $image_name);
            $product->image = asset('storage/images') . '/' . $image_name;
        }

        $product->save();
        return $product;
    }
}
