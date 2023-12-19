<?php

namespace App\Policies;

use App\Models\Show;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShowPolicy
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
        return $user->can('shows.index');
    }

    /**
     * Determine whether the user can manage the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function manage(User $user)
    {
        return $user->can('shows.manage');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('shows.manage');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Show  $Show
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Show $show)
    {
        return $show->deleted_at === null
            && $user->can('shows.manage');
    }

    public function update_own(User $user, Show $show)
    {
        return $show->deleted_at === null
            && $user->can('shows.update_own');
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Show $show)
    {
        return $show->deleted_at === null
            && $user->can('shows.manage');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Show $show)
    {
        return $show->deleted_at !== null
            && $user->can('shows.manage');
    }
}
