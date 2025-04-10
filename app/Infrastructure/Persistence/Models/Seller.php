<?php
namespace App\Infrastructure\Persistence\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seller extends Model
{
    protected $fillable = [
        'user_id',
        'store_name',
        'store_profile',
        'store_address',
        'store_background_image',
        'contact_phone'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
