<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = [
        'user_id',
        'claimed_by', // 'claimed_by' is the id of the user who claimed the product
        'category_id',
        'seo_id',
        'is_active',
        'is_featured',
        'is_claimed',
        'is_approved',
        'name',
        'slug',
        'description',
        'price',
        'condition',
        'brand',
        'thumbnail',
        'gallery',
    ];
    protected $casts = [
        'gallery' => 'array',
        'price' => 'decimal:2',
        'is_approved' => 'boolean',
        'is_claimed' => 'boolean',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function claimedBy() : BelongsTo
    {
        return $this->belongsTo(User::class, 'claimed_by');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function seo() : BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }

    public function getReviews() : BelongsTo
    {
        return $this->belongsTo(RateReview::class, 'id', 'item_id')->where('type', 'product');
    }
}
