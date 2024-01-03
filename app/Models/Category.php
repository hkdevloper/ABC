<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;

class Category extends Model implements HasMedia
{
    use HasFactory;
    use \Spatie\MediaLibrary\InteractsWithMedia;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'type',
        'slug',
        'image',
        'description',
        'is_active',
        'is_deleted',
        'is_featured',
        'parent_id',
        'seo_id',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class, 'seo_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class, 'category_id');
    }

    public function deals(): HasMany
    {
        return $this->hasMany(Deal::class, 'category_id');
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'category_id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'category_id');
    }

    public function forums(): HasMany
    {
        return $this->hasMany(Forum::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }

    // Count Item
    public function countItem(): int
    {
        return $this->products->count();
    }

}
