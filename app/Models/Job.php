<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'category_id',
        'seo_id',
        'is_active',
        'is_featured',
        'is_approved',
        'title',
        'slug',
        'summary',
        'description',
        'valid_until',
        'employment_type',
        'salary',
        'organization',
        'overview',
        'education',
        'experience',
        'thumbnail',
        'gallery',
        'website',
        'address_id',
    ];
    protected $casts = [
        'gallery' => 'array',
        'valid_until' => 'datetime',
        'is_approved' => 'boolean',
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
