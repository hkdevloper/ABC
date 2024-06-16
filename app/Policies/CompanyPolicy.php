<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;

class CompanyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Company $company): bool
    {
        // Authorization logic...
        if ($user->id == $company->user_id || $user->type == 'Admin' || $company->claimed_by == $user->id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // if user has already created a company, then he can't create another company
        if ($user->company && $user->type != 'Admin') {
            return false;
        }
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Company $company): bool
    {
        // Authorization logic...
        if ($user->id == $company->user_id || $user->type == 'Admin' || $company->claimed_by == $user->id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Company $company): bool
    {
        // Authorization logic...
        if ($user->id == $company->user_id || $user->type == 'Admin' || $company->claimed_by == $user->id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Company $company): bool
    {
        // Authorization logic...
        if ($user->id == $company->user_id || $user->type == 'Admin' || $company->claimed_by == $user->id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Company $company): bool
    {
        // Authorization logic...
        if ($user->id == $company->user_id || $user->type == 'Admin' || $company->claimed_by == $user->id) {
            return true;
        }
        return false;
    }
}
