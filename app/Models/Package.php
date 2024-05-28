<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $primaryKey = 'id';
    public static array $durationTypes = [
        'day' => 'Day',
        'week' => 'Week',
        'month' => 'Month',
        'year' => 'Year',
    ];
    protected $fillable = [
        'name',
        'description',
        'duration',
        'duration_type',
        'price',
        'discount_price',
        'featured',
        'is_active',
        'is_popular',
    ];

    protected $casts = [
        'featured' => 'array',
        'is_active' => 'boolean',
        'is_popular' => 'boolean',
        'price' => 'float',
        'discount_price' => 'float',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'package_user')
            ->withPivot('started_at', 'expired_at', 'is_active', 'is_expired', 'duration', 'duration_type', 'purchased_price', 'featured')
            ->withTimestamps();
    }

}
