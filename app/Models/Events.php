<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id',
        'category_id',
        'thumbnail_id',
        'gallery',
        'seo_id',
        'is_active',
        'is_claimed',
        'is_rsvp',
        'is_featured',
        'start',
        'end',
        'website',
        'address',
        'city_id',
        'state_id',
        'country_id',
        'zip_code',
        'longitude',
        'latitude',
        'map_zoom_level'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
