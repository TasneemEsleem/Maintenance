<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($user)
    {
        return $user->hasPermissionTo('Read-Users')
            ? $this->allow()
            : $this->deny('Don\'t have Permission ',403);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $User
     * @param  \App\Models\User  $User
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user,User $User)
    {
        return $user->hasPermissionTo('Read-Users')
        ? $this->allow()
        : $this->deny('Don\'t have Permission ', 403);

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create( $user)
    {
        return $user->hasPermissionTo('Create-User')
        ? $this->allow()
        : $this->deny('Don\'t have Permission ', 403);
}

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $User
     * @param  \App\Models\User  $User
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( $user, User $User)
    {
        return $user->hasPermissionTo('Update-User')
        ? $this->allow()
        : $this->deny('Don\'t have Permission ', 403);
}



    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $User
     * @param  \App\Models\User  $User
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete( $user, User $User)
    {
        return $user->hasPermissionTo('Delete-User')
            ? $this->allow()
            : $this->deny('Don\'t have Permission ', 403);
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $User
     * @param  \App\Models\User  $User
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $User
     * @param  \App\Models\User  $User
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user)
    {
        //
    }
}
