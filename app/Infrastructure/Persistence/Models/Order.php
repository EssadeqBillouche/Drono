<?php

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'order_number',
        'status',
        'payment_status',
        'total',
        'shipping_latitude',
        'shipping_longitude',
        'notes'
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'shipping_latitude' => 'decimal:8',
        'shipping_longitude' => 'decimal:8'
    ];

    public const STATUSES = [
        'PENDING' => 'pending',
        'PROCESSING' => 'processing',
        'COMPLETED' => 'completed',
        'CANCELLED' => 'cancelled'
    ];

    public const PAYMENT_STATUSES = [
        'PENDING' => 'pending',
        'PAID' => 'paid',
        'FAILED' => 'failed'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
