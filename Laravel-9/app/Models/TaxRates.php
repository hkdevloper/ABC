<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxRates extends Model
{
    use HasFactory;

    protected $table = 'tax_rates';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'rate',
        'compound',
        'tax_rate_location_id',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'tax_rate_location_id');
    }

    public function taxRate()
    {
        return $this->hasMany(TaxRates::class, 'tax_rate_location_id');
    }
}
