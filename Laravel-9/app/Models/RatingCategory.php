<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingCategory extends Model
{
    use HasFactory;
    protected $table = 'rating_categories';

    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'status'
    ];
}
