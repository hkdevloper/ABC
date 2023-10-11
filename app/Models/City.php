<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    protected $table = "cities";

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'featured',
        'state_id',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public function state() : BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function addresses() : HasMany
    {
        return $this->hasMany(Address::class);
    }
}
