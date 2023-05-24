<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $append = [
        'status_name',
        'status_color',
    ];

    protected $casts = [
        'seller_id' => 'int',
    ];

    public function getStatusNameAttribute(): string
    {
        return (new OrderStatus($this))->label();
    }

    public function getStatusColorAttribute(): string
    {
        return (new OrderStatus($this))->color();
    }

    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    public function orderBillingAddress(): HasOne
    {
        return $this->hasOne(OrderBillingAddress::class);
    }

    public function orderShippingAddress(): HasOne
    {
        return $this->hasOne(OrderShippingAddress::class);
    }
}
