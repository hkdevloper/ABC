<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPackage extends Model
{
    use HasFactory;
    protected $table = 'membership_packages';
    protected $primaryKey = 'id';
    public function plans()
    {
        return $this->hasMany(MembershipPackagePlan::class, 'membership_package_id', 'id');
    }
}
