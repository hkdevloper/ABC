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
        'subject',
        'country',
        'customer_name',
        'email',
        'phone',
        'description',
        'images',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'images' => 'array',
    ];
    public static array $statusList = [
        'Pending' => 'Pending',
        'Approved' => 'Approved',
    ];
}
