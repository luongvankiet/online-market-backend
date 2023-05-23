<?php

namespace App\Models;

class OrderStatus
{
    public const PENDING = 'pending';
    public const CONFIRMED = 'confirmed';
    public const SHIPPED = 'shipped';
    public const PAID = 'paid';
    public const COMPLETED = 'completed';
    public const CANCELLED = 'cancelled';
    public const DEFAULT_VALUE = self::PENDING;

    /** @var \App\Models\Order */
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public static function all(): array
    {
        return [
            static::PENDING,
            static::CONFIRMED,
            static::SHIPPED,
            static::PAID,
            static::COMPLETED,
            static::CANCELLED,
        ];
    }

    public static function labels(): array
    {
        return [
            static::PENDING => 'Pending',
            static::CONFIRMED => 'Confirmed',
            static::SHIPPED => 'Shipped',
            static::PAID => 'Paid',
            static::COMPLETED => 'Completed',
            static::CANCELLED => 'Cancelled',
        ];
    }

    public static function colors(): array
    {
        return [
            static::PENDING => 'warning',
            static::CONFIRMED => 'secondary',
            static::SHIPPED => 'info',
            static::PAID => 'info',
            static::COMPLETED => 'success',
            static::CANCELLED => 'danger',
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
        return static::labels()[$this->order->status] ?? '';
    }

    public function color()
    {
        return static::colors()[$this->order->status] ?? 'secondary';
    }

    public function transitionTo(string $status)
    {
        if (!in_array($status, static::all())) {
            throw new \RuntimeException('Status is invalid.');
        }

        $this->order->status = $status;
    }
}
