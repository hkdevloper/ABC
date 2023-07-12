<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPackage extends Model
{
    use HasFactory;
    protected $table = 'membership_packages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'type',
        'hidden',
        'featured',
        'featured_listings',
        'listing_position',
        'dedicated_listing_page',
        'extra_category_limit',
        'title_size_limit',
        'short_description_limit',
        'description_size_limit',
        'gallery_photos_limit',
        'show_address',
        'show_map',
        'allow_messages',
        'enable_review',
        'enable_seo',
        'require_backlink',
    ];
    protected $casts = [
        'hidden' => 'boolean',
        'featured' => 'boolean',
        'featured_listings' => 'boolean',
        'listing_position' => 'boolean',
        'dedicated_listing_page' => 'boolean',
        'extra_category_limit' => 'boolean',
        'title_size_limit' => 'boolean',
        'short_description_limit' => 'boolean',
        'description_size_limit' => 'boolean',
        'gallery_photos_limit' => 'boolean',
        'show_address' => 'boolean',
        'show_map' => 'boolean',
        'allow_messages' => 'boolean',
        'enable_review' => 'boolean',
        'enable_seo' => 'boolean',
        'require_backlink' => 'boolean',
    ];
    public function plans()
    {
        return $this->hasMany(MembershipPackagePlan::class, 'membership_package_id', 'id');
    }
}
