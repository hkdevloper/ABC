<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    protected $table = 'requirements';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'mobile',
        'email',
        'status',
        'created_at',
        'updated_at'
    ];
}
