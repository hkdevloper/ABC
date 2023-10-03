<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Enum;

class ListingType extends Model
{
    use HasFactory;
    protected $table = 'listing_type';
    protected $primaryKey = 'id';
    protected $fillable = [
        'published',
        'name-singular',
        'name-plural',
        'slug',
        'icon',
        'enable_locations',
        'enable_reviews',
        'per_user_limit',
        'parent_types',
        'rating_categories',
        'address_format',
        'approve_new_listing',
        'approve_edits',
        'approve_reviews',
        'approve_review_comments',
        'approve_messages',
        'approve_message_replies',
    ];

    protected $casts = [
        'parent_types' => 'array',
        'rating_categories' => 'array',
    ];

    protected array $type = [
        'local_business',
        'event',
        'job',
        'place',
        'classified',
        'offer',
        'blog',
    ];
}
