<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact_us';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'subject',
        'message',
        'status',
        'created_at',
        'updated_at'
    ];

    public static array $status = [
        'pending' => 'Pending',
        'completed' => 'Completed',
    ];
}
