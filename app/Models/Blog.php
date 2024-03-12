<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mews\Purifier\Casts\CleanHtml;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $primaryKey = "id";
    protected $fillable = [
        'company_id',
        'seo_id',
        'category_id',
        'is_active',
        'is_featured',
        'thumbnail',
        'title',
        'slug',
        'tags',
        'content',
        'summary',
    ];
    protected $casts = [
        'tags' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'content' => CleanHtml::class
    ];

    public function seo() : BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments() : HasMany
    {
        return $this->hasMany(BlogComments::class);
    }
}
