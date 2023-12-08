<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mews\Purifier\Casts\CleanHtml;

class Event extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'claimed_by', // 'claimed_by' is the id of the user who claimed the event
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
        'description' => CleanHtml::class
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function claimedBy() : BelongsTo
    {
        return $this->belongsTo(User::class, 'claimed_by');
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

    public function getReviews() : array | object
    {
        return RateReview::where('type', 'event')->where('item_id', $this->id)->paginate(3);
    }

    public function getReviewsCount() : int
    {
        return RateReview::where('type', 'event')->where('item_id', $this->id)->count();
    }
}
