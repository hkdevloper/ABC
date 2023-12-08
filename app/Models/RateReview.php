<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RateReview extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'type',
        'item_id',
        'rating',
        'review',
        'is_approved',
        'parent_id',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'rating' => 'integer',
        'parent_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent() : BelongsTo
    {
        return $this->belongsTo(RateReview::class, 'parent_id');
    }

    public function children() : HasMany
    {
        return $this->hasMany(RateReview::class, 'parent_id');
    }

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, 'item_id')->where('type', 'company');
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'item_id')->where('type', 'product');
    }

    public function event() : BelongsTo
    {
        return $this->belongsTo(Event::class, 'item_id')->where('type', 'event');
    }

}
