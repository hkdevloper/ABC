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
    protected $table = 'rate_reviews';
    protected $fillable = [
        'user_id',
        'type', // company, product, event
        'item_id', // company_id, product_id, event_id
        'rating',
        'review',
    ];

    protected $casts = [
        'is_approved' => 'boolean'
    ];

    protected $hidden = [
        'user',
        'company',
        'product',
        'event',
    ];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function company(): BelongsTo
    {
        // Use a closure to specify additional conditions
        return $this->belongsTo(Company::class, 'item_id')->where(function ($query) {
            $query->where('type', 'company');
        });
    }

    public function product(): BelongsTo
    {
        // Use a closure to specify additional conditions
        return $this->belongsTo(Product::class, 'item_id')->where(function ($query) {
            $query->where('type', 'product');
        });
    }

    public function event(): BelongsTo
    {
        // Use a closure to specify additional conditions
        return $this->belongsTo(Event::class, 'item_id')->where(function ($query) {
            $query->where('type', 'event');
        });
    }

}
