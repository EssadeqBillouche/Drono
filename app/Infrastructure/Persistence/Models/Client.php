<?php

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'shipping_address',
        'billing_address'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
