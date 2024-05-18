<?php

namespace App\Policies;

use App\Models\Consultant;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultantPolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_consultant');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Consultant $consultant): bool
    {
        return $user->can('view_consultant');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_consultant');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Consultant $consultant): bool
    {
        return $user->can('update_consultant');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Consultant $consultant): bool
    {
        return $user->can('delete_consultant');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Consultant $consultant): bool
    {
        return $user->can('restore_consultant');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Consultant $consultant): bool
    {
        return $user->can('force_delete_consultant');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_consultant');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_consultant');
    }


}
