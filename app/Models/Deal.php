<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deal extends Model
{
    use HasFactory;
    protected $table = 'deals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'category_id',
        'seo_id',
        'is_active',
        'is_featured',
        'title',
        'slug',
        'description',
        'offer_start_date',
        'offer_end_date',
        'price',
        'discount_type',
        'discount_value',
        'discount_code',
        'terms_and_conditions',
    ];
    protected $casts = [
        'offer_start_date' => 'datetime',
        'offer_end_date' => 'datetime',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function seo() : BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
}
