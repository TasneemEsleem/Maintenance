<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Language;
use Illuminate\Auth\Access\HandlesAuthorization;

class LanguagePolicy
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
        return $admin->hasPermissionTo('Read-Languages')
        ? $this->allow()
        : $this->deny('You have no permission for this action');     }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, Language $language)
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
        return $admin->hasPermissionTo('Create-Language')
        ? $this->allow()
        : $this->deny('You have no permission for this action');     }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Language $language)
    {
        return $admin->hasPermissionTo('Update-Language')
        ? $this->allow()
        : $this->deny('You have no permission for this action');     }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, Language $language)
    {
        return $admin->hasPermissionTo('Delete-Language')
        ? $this->allow()
        : $this->deny();    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Language $language)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Language $language)
    {
        //
    }
}
