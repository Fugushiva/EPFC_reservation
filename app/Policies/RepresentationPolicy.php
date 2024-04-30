<?php

namespace App\Policies;

use App\Models\Representation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RepresentationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Representation $representation): bool
    {

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->roles->contains('role', 'admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Representation $representation): bool
    {
        if (!$user->roles->contains('role', 'admin')) {
            return false;
        }

        if ($representation->representationReservations()->exists()) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Representation $representation): bool
    {
        if(!$user->roles->contains('role', 'admin')){
            return false;
        }

        if($representation->representationReservations()->exists()){
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Representation $representation): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Representation $representation): bool
    {
        //
    }
}
