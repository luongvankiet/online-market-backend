<?php

namespace App\Models;

use App\Models\Traits\Publishable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    use Publishable;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $append = [
        'status_name',
        'status_color',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getStatusNameAttribute(): string
    {
        return (new ProductStatus($this))->label();
    }

    public function getStatusColorAttribute(): string
    {
        return (new ProductStatus($this))->color();
    }

}
