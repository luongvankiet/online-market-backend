<?php

namespace App\Http\Controllers;

use App\Actions\CategoryActions\StoreCategoryAction;
use App\Actions\CategoryActions\UpdateCategoryAction;
use App\Http\QueryFilters\CategoryQueryFilter;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(
            CategoryQueryFilter::make(
                Category::query()->withCount('products')
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        StoreCategoryRequest $request,
        StoreCategoryAction $storeCategoryAction
    ) {
        return CategoryResource::make(
            ($storeCategoryAction)($request)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return CategoryResource::make($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(
        UpdateCategoryRequest $request,
        UpdateCategoryAction $updateCategoryAction,
        Category $category
    ) {
        return CategoryResource::make(
            ($updateCategoryAction)(
                $category,
                $request
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function deleteMany(Request $request)
    {
        Category::whereIn('id', $request->input('category_ids'))->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
