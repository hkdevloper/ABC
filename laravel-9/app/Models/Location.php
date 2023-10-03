<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'types',
        'parent_id',
        'slug'
    ];

    public function parent()
    {
        // return the parent of a location
        return $this->belongsTo(Location::class, 'parent_id');
    }

    public function children()
    {
        // return all the children of a location
        return $this->hasMany(Location::class, 'parent_id');
    }
}
