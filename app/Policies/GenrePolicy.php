<?php

namespace App\Policies;

use App\Models\Genre;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenrePolicy
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
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Genre $genre)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return $this->isLibrarian($user);

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Genre $genre)
    {
        //
        return $this->isLibrarian($user);

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Genre $genre)
    {
        //
        return $this->isLibrarian($user);

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Genre $genre)
    {
        //
        return $this->isLibrarian($user);

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Genre $genre)
    {
        //
        return $this->isLibrarian($user);

    }

    private function isLibrarian(User $user)
    {
        return $user->is_librarian == 1;
    }
}
