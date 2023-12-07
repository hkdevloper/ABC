<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mews\Purifier\Casts\CleanHtml;

class BlogComments extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'blog_comments';
    protected $fillable = [
        'blog_id',
        'user_id',
        'comment',
        'name',
        'email',
        'is_approved',
        'is_spam',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'is_spam' => 'boolean',
        'comment' => CleanHtml::class,
    ];

    public function blog() : BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
