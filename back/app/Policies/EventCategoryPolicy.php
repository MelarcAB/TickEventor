<?php

namespace App\Policies;

use App\Models\Events\EventCategory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventCategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EventCategory $eventCategory): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //user role == admin
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EventCategory $eventCategory): bool
    {
        //user role == admin
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EventCategory $eventCategory): bool
    {
        //user role == admin
        return $user->role === 'admin';

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EventCategory $eventCategory): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EventCategory $eventCategory): bool
    {
        return $user->role === 'admin';
    }
}
