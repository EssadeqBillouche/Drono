<?php
namespace App\Infrastructure\Persistence\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'store_name',
        'store_category',
        'store_profile',
        'store_background_image',
        'store_address',
        'tax_id',
        'description',
        'contact_phone'
    ];

// If using enum, you can add these constants for easy reference
    public const STORE_CATEGORIES = [
        'PHARMACY' => 'pharmacy',
        'GROCERY' => 'grocery',
        'ELECTRONICS' => 'electronics',
        'FASHION' => 'fashion',
        'RESTAURANT' => 'restaurant',
        'BEAUTY' => 'beauty',
        'HOME_GARDEN' => 'home_garden',
        'SPORTS' => 'sports',
        'BOOKS' => 'books',
        'TOYS' => 'toys'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany{
        return $this->hasMany(Product::class);
    }
    protected static function newFactory()
    {
        return \Database\Factories\SellerFactory::new();
    }

}
