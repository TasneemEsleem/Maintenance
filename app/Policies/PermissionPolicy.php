<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Permission ;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Permission  $Permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($user)
    {
        return $user->hasPermissionTo('Read-Permissions')
        ? $this->allow()
        : $this->deny('Don\'t have Permission ',403);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Permission  $Permission
     * @param  \App\Models\Permission  $Permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user,Permission $permission)
    {

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Permission  $Permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create( $user)
    {

}

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Permission  $Permission
     * @param  \App\Models\Permission  $Permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( $user, Permission $Permission)
    {

}



    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Permission  $Permission
     * @param  \App\Models\Permission  $Permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete( $user, Permission $Permission)
    {

    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Permission  $Permission
     * @param  \App\Models\Permission  $Permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Permission $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Permission  $Permission
     * @param  \App\Models\Permission  $Permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Permission $user)
    {
        //
    }
}
