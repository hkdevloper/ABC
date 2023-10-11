<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;
    protected $table = "countries";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'code',
        'phone_code',
        'currency',
        'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public function states() : HasMany
    {
        return $this->hasMany(State::class);
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
