<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FavoriteCompanies extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'favorite_companies';
    protected $fillable = [
        'user_id',
        'company_id',
    ];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
