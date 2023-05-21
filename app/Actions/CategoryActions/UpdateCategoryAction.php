<?php

namespace App\Actions\CategoryActions;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class UpdateCategoryAction
{
    public function __invoke(Category $category, UpdateCategoryRequest $updateCategoryRequest): ?Category
    {
        $category->name = $updateCategoryRequest->input('name');
        $category->description = $updateCategoryRequest->input('description');
        $category->published_at = $updateCategoryRequest->input('published_at');
        $category->seller_id = $updateCategoryRequest->input('seller_id');

        $category->save();
        return $category;
    }
}
