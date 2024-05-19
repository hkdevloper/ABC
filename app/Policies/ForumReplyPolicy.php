<?php

namespace App\Policies;

use App\Models\ForumReply;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ForumReplyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if(!auth()->user()->canManageSettings()){
            $company = \App\Models\Company::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
            if($company){
                redirect('/user/companies/'.$company->id);
            }else{
                redirect('/user/companies/create');
            }
        }
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ForumReply $forumReply): bool
    {
        // Authorization logic...
        if($user->type == 'Admin'){
            return true;
        }
        if(!$user->company){
            return false;
        }
        if ($user->company->id == $forumReply->user_id || $user->type == 'Admin') {
            return true;
        }
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
    public function update(User $user, ForumReply $forumReply): bool
    {
        // Authorization logic...
        if($user->type == 'Admin'){
            return true;
        }
        if(!$user->company){
            return false;
        }
        if ($user->id == $forumReply->user_id || $user->type == 'Admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ForumReply $forumReply): bool
    {
        // Authorization logic...
        if($user->type == 'Admin'){
            return true;
        }
        if(!$user->company){
            return false;
        }
        if ($user->company->id == $forumReply->user_id || $user->type == 'Admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ForumReply $forumReply): bool
    {
        // Authorization logic...
        if($user->type == 'Admin'){
            return true;
        }
        if(!$user->company){
            return false;
        }
        if ($user->company->id == $forumReply->user_id || $user->type == 'Admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ForumReply $forumReply): bool
    {
        // Authorization logic...
        if($user->type == 'Admin'){
            return true;
        }
        if(!$user->company){
            return false;
        }
        if ($user->company->id == $forumReply->user_id || $user->type == 'Admin') {
            return true;
        }
        return false;
    }
}
