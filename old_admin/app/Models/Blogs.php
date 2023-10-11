<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'thumbnail_id', 'seo_id', 'is_active', 'is_featured', 'title', 'slug', 'content',
    ];

}
