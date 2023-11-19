<?php
//
//namespace App\Policies;
//
//use App\Models\Category;
//use App\Models\User;
//use Illuminate\Auth\Access\HandlesAuthorization;
//
//class MoviesPolicy
//{
//    use HandlesAuthorization;
//
//    /**
//     * Determine whether the user can view any models.
//     *
//     * @param  \App\Models\User  $user
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//    public function viewAny(User $user)
//    {
//        return $user->can('movies.index');
//    }
//
//    /**
//     * Determine whether the user can create models.
//     *
//     * @param  \App\Models\User  $user
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//    public function create(User $user)
//    {
//        return $user->can('movies.manage');
//    }
//
//    /**
//     * Determine whether the user can update the model.
//     *
//     * @param  \App\Models\User  $user
//     * @param  \App\Models\Movies  $movie
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//    public function update(User $user, Category $movie)
//    {
//        return $movie->deleted_at === null
//            && $user->can('movies.manage');
//    }
//
//    /**
//     * Determine whether the user can delete the model.
//     *
//     * @param  \App\Models\User  $user
//     * @param  \App\Models\Category  $category
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//    public function delete(User $user, Category $movie)
//    {
//        return $movie->deleted_at === null
//            && $user->can('movies.manage');
//    }
//
//    /**
//     * Determine whether the user can restore the model.
//     *
//     * @param  \App\Models\User  $user
//     * @param  \App\Models\Movie  $movie
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//    public function restore(User $user, Category $movie)
//    {
//        return $movie->deleted_at !== null
//            && $user->can('movies.manage');
//    }
//}
