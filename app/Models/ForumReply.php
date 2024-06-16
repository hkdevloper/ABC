<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mews\Purifier\Casts\CleanHtml;

class ForumReply extends Model
{
    protected $table = 'forum_replies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'body',
        'user_id',
        'forum_id',
    ];
    protected $casts = [
        //'body' => CleanHtml::class
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function forum(): BelongsTo
    {
        return $this->belongsTo(Forum::class);
    }

    // Function to Count like
    public function countLikes()
    {
        return rand(0, 100);
    }

    // Function to Count dislike
    public function countDislikes()
    {
        return rand(0, 100);
    }
}
