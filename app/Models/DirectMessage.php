<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DirectMessage extends Model
{
    use HasFactory;
    protected $table = 'direct_messages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'email',
        'phone',
        'company_name',
        'name',
        'message',
        'status'
    ];

    public static array $statusList = [
        'Pending' => 'Pending',
        'Completed' => 'Completed',
        'Spam' => 'Spam',
    ];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
