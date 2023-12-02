<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $table = "addresses";

    protected $primaryKey = 'id';

    protected $fillable = [
        'address_line_1',
        'city_id',
        'state_id',
        'country_id',
        'zip_code',
        'latitude',
        'longitude',
        'summary',
        'description',
        'seo_id',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'map_zoom_level' => 'integer',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function seo(): BelongsTo
    {
        return $this->belongsTo(Seo::class);
    }
}
