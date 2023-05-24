<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    protected $table = 'user_group';
    protected $fillable = [
        'name',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function hasPermission($permission)
    {
        return $this->permissions[$permission] ?? false;
    }

    public function givePermissionTo($permission)
    {
        $permissions = $this->permissions;
        $permissions[$permission] = true;
        $this->permissions = $permissions;
        $this->save();
    }

}
