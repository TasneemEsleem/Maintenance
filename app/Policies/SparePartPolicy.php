<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\SparePart;
use Illuminate\Auth\Access\HandlesAuthorization;

class SparePartPolicy
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
        return $admin->hasPermissionTo('Read-Spare-Parts')
        ? $this->allow()
        : $this->deny('You have no permission for this action'); 
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SparePart  $sparePart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, SparePart $sparePart)
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
        return $admin->hasPermissionTo('Create-Spare-Part')
        ? $this->allow()
        : $this->deny('You have no permission for this action'); 
        }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SparePart  $sparePart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, SparePart $sparePart)
    {
        return $admin->hasPermissionTo('Update-Spare-Part')
        ? $this->allow()
        : $this->deny('You have no permission for this action'); 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SparePart  $sparePart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, SparePart $sparePart)
    {
        return $admin->hasPermissionTo('Delete-Spare-Part')
        ? $this->allow()
        : $this->deny('You have no permission for this action');      }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SparePart  $sparePart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, SparePart $sparePart)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SparePart  $sparePart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, SparePart $sparePart)
    {
        //
    }
}
