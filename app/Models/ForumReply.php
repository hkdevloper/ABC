<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumReply extends Model
{
    use HasFactory;
    protected $table = 'forum_replies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'body',
        'user_id',
        'forum_id',
        'body'
    ];
}
