<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mews\Purifier\Casts\CleanHtml;

class Forum extends Model
{
    use HasFactory;
    protected $table = 'forums';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'company_id',
        'image'
    ];
    protected $casts = [
        //'body' => CleanHtml::class
    ];

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function forumReplies() : HasMany
    {
        return $this->hasMany(ForumReply::class);
    }

    public function countAnswers() : int
    {
        return $this->forumReplies()->count();
    }

    public function delete() : bool
    {
        $this->forumReplies()->delete();
        return parent::delete();
    }
}
