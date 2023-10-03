<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $primaryKey = 'id';

    // get the user that owns the company
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // get the category that owns the company
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // get the seo that owns the company
    public function seo()
    {
        return $this->belongsTo(Seo::class, 'seo_id');
    }


}
