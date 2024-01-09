<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedDomain extends Model
{
    protected $table = 'blocked_domains';
    protected $fillable = [
        'domain',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
