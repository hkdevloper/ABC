<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;
    protected $table = "states";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'featured',
        'country_id',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function cities() : HasMany
    {
        return $this->hasMany(City::class);
    }

    public function addresses() : HasMany
    {
        return $this->hasMany(Address::class);
    }
}
