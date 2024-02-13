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
    protected $fillable = ['user_id', 'company_id', 'email', 'phone', 'website', 'company_name', 'message', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
