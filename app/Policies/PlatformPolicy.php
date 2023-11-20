<?php

namespace App\Policies;

use App\Models\Platform;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlatformPolicy
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
        return $user->can('platforms.index');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('platforms.manage');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Platform  $platforms
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Platform $platforms)
    {
        return $platforms->deleted_at === null
            && $user->can('platforms.manage');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Platform  $platforms
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Platform $platforms)
    {
        return $platforms->deleted_at === null
            && $user->can('platforms.manage');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Platform $platform)
    {
        return $platform->deleted_at !== null
            && $user->can('platforms.php.manage');
    }
}
