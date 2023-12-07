<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'subscribes';
    protected $fillable = [
        'email'
    ];
}
