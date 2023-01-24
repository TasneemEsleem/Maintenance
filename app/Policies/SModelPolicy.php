<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\SModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class SModelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $admin)
    {
        return $admin->hasPermissionTo('Read-Models')
        ? $this->allow()
        : $this->deny('You have no permission for this action'); 
        }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SModel  $sModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, SModel $sModel)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo('Create-Model')
        ? $this->allow()
        : $this->deny('You have no permission for this action');     }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SModel  $sModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, SModel $sModel)
    {
        return $admin->hasPermissionTo('Update-Model')
        ? $this->allow()
        : $this->deny('You have no permission for this action');  
    
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SModel  $sModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, SModel $sModel)
    {
        return $admin->hasPermissionTo('Delete-Model')
        ? $this->allow()
        : $this->deny('You have no permission for this action');      }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SModel  $sModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, SModel $sModel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SModel  $sModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, SModel $sModel)
    {
        //
    }
}
