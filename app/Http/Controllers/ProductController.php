<?php

namespace App\Http\Controllers;

use App\Actions\ProductActions\StoreProductAction;
use App\Actions\ProductActions\UpdateProductAction;
use App\Http\QueryFilters\ProductQueryFilter;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(
            ProductQueryFilter::make(
                Product::query()->with('category')
            )
        );
    }

    public function store(
        StoreProductRequest $request,
        StoreProductAction $storeProductAction
    ) {
        return ProductResource::make(
            ($storeProductAction)($request)
        );
    }

    public function show(Product $product)
    {
        return ProductResource::make($product);
    }

    public function update(
        UpdateProductRequest $request,
        UpdateProductAction $updateProductAction,
        Product $product
    ) {
        return ProductResource::make(
            ($updateProductAction)(
                $product,
                $request
            )
        );
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function deleteMany(Request $request)
    {
        Product::whereIn('id', $request->input('product_ids'))->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
