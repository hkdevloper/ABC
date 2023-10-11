<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'seo_id',
        'category_id',
        'is_active',
        'is_featured',
        'thumbnail',
        'title',
        'slug',
        'tags',
        'content',
    ];
    protected $casts = [
        'tags' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function seo() : BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
