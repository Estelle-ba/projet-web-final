<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     */
    public function create(): bool
    {
        $user = auth()->user();
        return $user->role == "manager";
    }
}
