<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;
    protected $table = "companies";
    protected $primaryKey = "id";
    protected $fillable = [
        'is_approved',
        'is_claimed',
        'is_active',
        'is_featured',
        'user_id',
        'category_id',
        'seo_id',
        'name',
        'slug',
        'description',
        'extra_things',
        'logo',
        'gallery',
        'phone',
        'email',
        'website',
        'facebook',
        'twitter',
        'instagram',
        'linkdin',
        'youtube',
        'address_id',
    ];

    protected $casts = [
        'extra_things' => 'array',
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
