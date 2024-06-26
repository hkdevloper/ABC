<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mews\Purifier\Casts\CleanHtml;

class Job extends Model
{
    use HasFactory;
    protected $table = 'company_jobs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
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
        'education',
        'experience',
        'thumbnail',
        'address_id',
        'hr_email',
    ];
    protected $casts = [
        'valid_until' => 'datetime',
        'is_approved' => 'boolean',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'summary' => CleanHtml::class,
    ];

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
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

    public function fullAddress(): string
    {
        return "{$this->address->address_line_1}, {$this->address->country->name}, {$this->address->state->name}, {$this->address->city}, {$this->address->zip_code}";
    }
}
