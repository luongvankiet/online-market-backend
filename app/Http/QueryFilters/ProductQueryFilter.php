<?php

namespace App\Http\QueryFilters;

class ProductQueryFilter extends QueryFilter
{
    protected $searchable = [
        'name', 'product_code', 'product_sku'
    ];

    public function sellerId($value)
    {
        if (!$value) {
            return;
        }

        $this->queryBuilder
            ->where('seller_id', $value);
    }
}
