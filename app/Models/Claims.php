<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Claims extends Model
{
    use HasFactory;
    protected $table = 'claims';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'email', 'phone', 'website', 'company_name', 'message', 'status'];
    protected $casts = [
        'status' => 'boolean',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
