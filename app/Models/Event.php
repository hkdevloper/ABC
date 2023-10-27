<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'category_id',
        'seo_id',
        'thumbnail',
        'gallery',
        'is_active',
        'is_featured',
        'is_claimed',
        'is_approved',
        'title',
        'slug',
        'description',
        'start',
        'end',
        'address_id',
    ];
    protected $casts = [
        'gallery' => 'array',
        'is_approved' => 'boolean',
        'is_claimed' => 'boolean',
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

    public function address() : BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
