<?php

namespace App\Actions\CategoryActions;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class StoreCategoryAction
{
    public function __invoke(StoreCategoryRequest $request): ?Category
    {
        $category = new Category();

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->published_at = $request->input('published_at');
        $category->seller_id = $request->input('seller_id');

        $category->save();
        return $category;
    }
}
