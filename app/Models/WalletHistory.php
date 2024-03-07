<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WalletHistory extends Model
{
    use HasFactory;

    protected $table = 'wallet_history';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'type',
        'transaction_id',
        'amount',
        'status',
        'json_response',
        'method',
        'currency',
        'user_email',
        'contact',
        'fee',
        'tax',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getAmountAttribute($value): string
    {
        return number_format($value, 2);
    }
}
