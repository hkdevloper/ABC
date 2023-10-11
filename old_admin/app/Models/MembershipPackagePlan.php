<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPackagePlan extends Model
{
    use HasFactory;
    protected $table = 'membership_package_plans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'membership_package_id',
        'hidden',
        'auto_approve_listing',
        'user_cancellable',
        'billing_period',
        'number_of_periods',
        'price',
        'user_limit',
        'per_users_limit',
        'supported_payment_gateways',
    ];

    public function membershipPackage()
    {
        return $this->belongsTo(MembershipPackage::class);
    }
}
