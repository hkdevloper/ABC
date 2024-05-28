<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PackageUser extends Model
{
    use HasFactory;

    protected $table = 'package_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'package_id',
        'user_id',
        'started_at',
        'expired_at',
        'is_active',
        'is_expired',
        'duration',
        'duration_type',
        'purchased_price',
        'featured',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'expired_at' => 'datetime',
        'is_active' => 'boolean',
        'is_expired' => 'boolean',
        'purchased_price' => 'float',
        'featured' => 'array',
    ];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
