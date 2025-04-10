<?php

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'user_id',
        'permission_level'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
