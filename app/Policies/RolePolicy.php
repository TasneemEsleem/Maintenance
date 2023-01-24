<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($user)
    {
        return $user->hasPermissionTo('Read-Roles')
            ? $this->allow()
            : $this->deny('Don\'t have Permission ',403);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Role  $Role
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user,Role $role)
    {
        return $user->hasPermissionTo('Read-Roles')
        ? $this->allow()
        : $this->deny('Don\'t have Permission ', 403);

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create( $user)
    {
        return $user->hasPermissionTo('Create-Role')
        ? $this->allow()
        : $this->deny('Don\'t have Permission ', 403);
}

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Role  $Role
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( $user, Role $role)
    {
        return $user->hasPermissionTo('Update-Role')
        ? $this->allow()
        : $this->deny('Don\'t have Permission ', 403);
}



    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Role  $Role
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete( $user, Role $role)
    {
        return $user->hasPermissionTo('Delete-Role')
            ? $this->allow()
            : $this->deny('Don\'t have Permission ', 403);
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Role  $Role
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Role $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Role  $Role
     * @param  \App\Models\Role  $Role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Role $user)
    {
        //
    }
}
