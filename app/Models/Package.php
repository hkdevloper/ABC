<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'balance',
        'duration',
        'status',
        'is_featured',
        'is_popular',
        'is_trending',
        'is_new'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_popular' => 'boolean',
        'is_trending' => 'boolean',
        'is_new' => 'boolean',
        'price' => 'float',
        'balance' => 'float',
        'duration' => 'custom_datetime',
    ];

}
