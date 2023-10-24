<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatCounter extends Model
{
    use HasFactory;

    protected $table = 'stat_counters';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type',     // view, like, share
        'category', // company, product, event, job, blog, forum
        'field_id', // id of the category
        'count',    // number of views, likes, shares
    ];


}
