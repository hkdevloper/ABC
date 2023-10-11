<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Seo extends Model
{
    use HasFactory;
    protected $table = 'seo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'meta_description',
        'meta_keywords',
    ];
    protected $casts = [
        'meta_keywords' => 'array',
    ];

    public function deal() : HasOne
    {
        return $this->hasOne(Deal::class);
    }

    public function event() : HasOne
    {
        return $this->hasOne(Event::class);
    }

    public function category() : HasOne
    {
        return $this->hasOne(Category::class);
    }

    public function product() : HasOne
    {
        return $this->hasOne(Product::class);
    }

    public function blog() : HasOne
    {
        return $this->hasOne(Blog::class);
    }

    public function company() : HasOne
    {
        return $this->hasOne(Company::class);
    }

    public function address() : HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function job() : HasOne
    {
        return $this->hasOne(Job::class);
    }
}
