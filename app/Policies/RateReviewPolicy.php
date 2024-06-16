<?php

namespace App\Policies;

use App\Models\RateReview;
use App\Models\User;

class RateReviewPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->type == 'Admin'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RateReview $rateReview): bool
    {
        if($user->type == 'Admin'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->type == 'Admin'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RateReview $rateReview): bool
    {
        if($user->type == 'Admin'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RateReview $rateReview): bool
    {
        if($user->type == 'Admin'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RateReview $rateReview): bool
    {
        if($user->type == 'Admin'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RateReview $rateReview): bool
    {
        if($user->type == 'Admin'){
            return true;
        }
        return false;
    }
}
