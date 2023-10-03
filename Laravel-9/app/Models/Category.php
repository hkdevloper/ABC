<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table= 'categories';
    protected $primaryKey= 'id';

    // Save Seo
    public function seo(){
        return $this->hasOne(Seo::class, 'id', 'seo_id');
    }

    // parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // child category
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
