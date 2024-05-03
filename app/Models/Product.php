<?php

namespace App\Models;

use Exception;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'products';
    protected $fillable = [
        'company_id',
        'claimed_by', // 'claimed_by' is the id of the user who claimed the product
        'category_id',
        'seo_id',
        'is_active',
        'is_featured',
        'is_claimed',
        'is_approved',
        'name',
        'slug',
        'description',
        'price',
        'condition',
        'brand',
        'thumbnail',
        'gallery',
        'color',
        'size',
        'material'
    ];
    protected $casts = [
        'gallery' => 'array',
        'price' => 'decimal:2',
        'is_approved' => 'boolean',
        'is_claimed' => 'boolean',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function save(array $options = []): bool
    {
        try {
            $user = $this->company()->first()->user()->first();
            $data = Product::find($this->id);
            if (array_key_exists('is_approved', $options)
                && array_key_exists('is_active', $options)) {
                Notification::make()
                    ->title('Array key exists!')
                    ->body($options->name . ' status updated by Admin.')
                    ->sendToDatabase($user);
                if ($data->is_approved != $options['is_approved'] ||
                    $data->is_active != $options['is_active']
                ) {
                    Notification::make()
                        ->title('Product Status Update')
                        ->body($options->name . ' status updated by Admin.')
                        ->sendToDatabase($user);
                }
            }else{
                Notification::make()
                    ->title('Array key does not exists!')
                    ->body($options->name . ' status updated by Admin.')
                    ->sendToDatabase($user);
            }
        } catch (Exception $e) {
            // Log the error
        } finally {
            return parent::save($options);
        }
    }


    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function claimedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'claimed_by');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }

    public function getReviews(): array|object
    {
        return RateReview::where('type', 'product')->where('item_id', $this->id)->paginate(3);
    }

    public function getReviewsCount(): int
    {
        return RateReview::where('type', 'product')->where('item_id', $this->id)->count();
    }
}
