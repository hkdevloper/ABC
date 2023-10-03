<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempFiles extends Model
{
    use HasFactory;

    protected $table = 'temp_files';

    protected $fillable = [
        'folder',
        'filename'
    ];
}
