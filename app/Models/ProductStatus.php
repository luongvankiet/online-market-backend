<?php

namespace App\Models;

class ProductStatus
{
    public const IN_STOCK = 'in_stock';
    public const OUT_OF_STOCK = 'out_of_stock';
    public const DEFAULT_VALUE = self::IN_STOCK;

    /** @var \App\Models\Product */
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public static function all(): array
    {
        return [
            static::IN_STOCK,
            static::OUT_OF_STOCK,
        ];
    }

    public static function labels(): array
    {
        return [
            static::IN_STOCK => __('In Stock'),
            static::OUT_OF_STOCK => __('Out of Stock'),
        ];
    }

    public static function colors(): array
    {
        return [
            static::IN_STOCK => 'success',
            static::OUT_OF_STOCK => 'danger',
        ];
    }

    public static function toArray()
    {
        return [
            'labels' => self::labels(),
            'colors' => self::colors(),
        ];
    }

    public function label()
    {
        return static::labels()[$this->product->status] ?? '';
    }

    public function color()
    {
        return static::colors()[$this->product->status] ?? 'secondary';
    }

    public function transitionTo(string $status)
    {
        if (!in_array($status, static::all())) {
            throw new \RuntimeException('Status is invalid.');
        }

        $this->product->status = $status;
    }
}
