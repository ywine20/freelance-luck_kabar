<?php

namespace App\Policies;

use App\Domains\Auth\Models\User;
use App\Models\CarItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Domains\Auth\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Domains\Auth\Models\User  $user
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CarItem $carItem)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Domains\Auth\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Domains\Auth\Models\User  $user
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CarItem $carItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Domains\Auth\Models\User  $user
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CarItem $carItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Domains\Auth\Models\User  $user
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CarItem $carItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Domains\Auth\Models\User  $user
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CarItem $carItem)
    {
        //
    }
}
