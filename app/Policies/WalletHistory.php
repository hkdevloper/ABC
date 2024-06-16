<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WalletHistory as WH;

class WalletHistory
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, WH $walletHistory): bool
    {
        // Authorization logic...

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WH $walletHistory): bool
    {
        // Authorization logic...
        if($user->type == 'Admin'){
            return true;
        }
        if(!$user->company){
            return false;
        }
        if ($user->id == $walletHistory->user_id || $user->type == 'Admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WH $walletHistory): bool
    {
        // Authorization logic...
        if($user->type == 'Admin'){
            return true;
        }
        if(!$user->company){
            return false;
        }
        if ($user->id == $walletHistory->user_id || $user->type == 'Admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, WH $walletHistory): bool
    {
        // Authorization logic...
        if($user->type == 'Admin'){
            return true;
        }
        if(!$user->company){
            return false;
        }
        if ($user->id == $walletHistory->user_id || $user->type == 'Admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, WH $walletHistory): bool
    {
        // Authorization logic...
        if($user->type == 'Admin'){
            return true;
        }
        if(!$user->company){
            return false;
        }
        if ($user->id == $walletHistory->user_id || $user->type == 'Admin') {
            return true;
        }
        return false;
    }
}
