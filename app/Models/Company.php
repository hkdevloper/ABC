<?php

namespace App\Models;

use App\Filament\User\Resources\BookmarkCompaniesResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mews\Purifier\Casts\CleanHtml;

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
        'claimed_by',
        'category_id',
        'seo_id',
        'name',
        'slug',
        'description',
        'extra_things',
        'logo',
        'banner',
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
        'description'    => CleanHtml::class, // cleans when setting the value
    ];
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'user_id', 'user_id');
    }

    public function claimedBy() : BelongsTo
    {
        return $this->belongsTo(User::class, 'claimed_by', 'id');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function seo() : BelongsTo
    {
        return $this->belongsTo(Seo::class, 'seo_id', 'id');
    }

    public function address() : BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function fullAddress() : string
    {
        $address = $this->address;
        $addressString = "";
        if ($address->city) {
            $addressString .= $address->city . ", ";
        }
        if ($address->state) {
            $addressString .= $address->state->name . ", ";
        }
        if ($address->country) {
            $addressString .= $address->country->name . ", ";
        }
        if ($address->zip_code) {
            $addressString .= $address->zip_code;
        }
        return $addressString;
    }

    public function dealsIn() : string
    {
        $dealsIn = "";
        if ($this->extra_things) {
            foreach ($this->extra_things as $item) {
                $dealsIn .= $item . ", ";
            }
        }
        return $dealsIn;
    }

    public function getReviews() : array | object
    {
        return RateReview::where('type', 'company')->where('item_id', $this->id)->paginate(3);
    }

    public function getReviewsCount() : int
    {
        return RateReview::where('type', 'company')->where('item_id', $this->id)->count();
    }

    public function getAverageRating() : float
    {
        $reviews = RateReview::where('type', 'company')->where('item_id', $this->id)->get();
        $totalRating = 0;
        foreach ($reviews as $review) {
            $totalRating += $review->rating;
        }
        if ($totalRating > 0) {
            return $totalRating / $reviews->count();
        }
        return 0;
    }

    // Bookmark
    public function bookmarkCompanies() : HasMany
    {
        return $this->hasMany(BookmarkCompanies::class, 'company_id', 'id');
    }

    // override delete method
    public function delete() : bool
    {
        $this->bookmarkCompanies()->delete();
        $this->products()->delete();
        $this->seo()->delete();
        $this->address()->delete();
        $this->claimedBy()->delete();
        return parent::delete();
    }
}
