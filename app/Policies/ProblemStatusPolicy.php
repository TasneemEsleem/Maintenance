<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\ProblemStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProblemStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny( $admin)

    {
        return $admin->hasPermissionTo('Read-Problems-status')
        ? $this->allow()
        : $this->deny('You have no permission for this action');     }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ProblemStatus  $problemStatus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, ProblemStatus $problemStatus)
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
        return $admin->hasPermissionTo('Create-Problem-status')
        ? $this->allow()
        : $this->deny('You have no permission for this action');
        }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ProblemStatus  $problemStatus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, ProblemStatus $problemStatus)
    {
        return $admin->hasPermissionTo('Update-Problem-status')
        ? $this->allow()
        : $this->deny('You have no permission for this action');       }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ProblemStatus  $problemStatus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, ProblemStatus $problemStatus)
    {
        return $admin->hasPermissionTo('Delete-Problem-status')
        ? $this->allow()
        : $this->deny('You have no permission for this action');
        }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ProblemStatus  $problemStatus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, ProblemStatus $problemStatus)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ProblemStatus  $problemStatus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, ProblemStatus $problemStatus)
    {
        //
    }
}
