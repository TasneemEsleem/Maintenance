<?php

namespace App\Policies;


use App\Models\Problem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProblemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('Read-Problems')
        ? $this->allow()
        : $this->deny('You have no permission for this action');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Problem  $Problem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Problem $Problem)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
            return $user->hasPermissionTo('Create-Problem')
            ? $this->allow()
            : $this->deny('You have no permission for this action');

      }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Problem  $Problem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Problem $problem)
    {
            return $user->hasPermissionTo('Update-Problem')
            ? $this->allow()
            : $this->deny('You have no permission for this action');


             }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Problem  $Problem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Problem $problem)
    {
        return $user->hasPermissionTo('Delete-Problem')
        ? $this->allow()
        : $this->deny();


    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Problem  $Problem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Problem $problem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Problem  $Problem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Problem $problem)
    {
        //
    }
}
