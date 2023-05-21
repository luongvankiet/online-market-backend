<?php

namespace App\Actions\ProductActions;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;

class UpdateProductAction
{
    public function __invoke(Product $product, UpdateProductRequest $updateProductRequest): Product
    {
        $product->name = $updateProductRequest->input('name');
        $product->description = $updateProductRequest->input('description');
        $product->product_sku = $updateProductRequest->input('product_sku');
        $product->product_code = $updateProductRequest->input('product_code');
        $product->status = $updateProductRequest->input('status');
        $product->regular_price = $updateProductRequest->input('regular_price');
        $product->sale_price = $updateProductRequest->input('sale_price');
        $product->quantity = $updateProductRequest->input('quantity');
        $product->unit = $updateProductRequest->input('unit');
        $product->seller_id = $updateProductRequest->input('seller_id');
        $product->published_at =  $updateProductRequest->input('published_at');

        if ($updateProductRequest->filled('category_id')) {
            $categoryId = $updateProductRequest->input('category_id');
            $category = Category::find($categoryId);

            if ($category) {
                $product->category()->associate($category);
            }
        }

        $product->save();
        return $product;
    }
}
