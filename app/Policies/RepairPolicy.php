<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Repair;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepairPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('Read-Repair')
        ? $this->allow()
        : $this->deny('You have no permission for this action');  
       }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Repair $repair)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create-Repair')
        ? $this->allow()
        : $this->deny('You have no permission for this action');      }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Repair $repair)
    {
        return $user->hasPermissionTo('Update-Repair')
        ? $this->allow()
        : $this->deny('You have no permission for this action'); 
         }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Repair $repair)
    {
        return $user->hasPermissionTo('Delete-Repair')
        ? $this->allow()
        : $this->deny('You have no permission for this action');     }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Repair $repair)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Repair $repair)
    {
        //
    }
}
