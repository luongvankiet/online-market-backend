<?php

namespace App\Http\QueryFilters;

class OrderQueryFilter extends QueryFilter
{
    protected $searchable = [
        'order_code',
    ];
}
