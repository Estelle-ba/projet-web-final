<?php

namespace App\Policies;

use App\Models\Representative;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RepresentativePolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(): bool
    {
        $user = auth()->user();
        return $user->role === "student";
    }

    /**
     * Determine whether the user can create models.
     */

}
