<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\App;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function show(User $user, User $routeUser)
    {
        $role_admin = config('contants.role_admin');
        return $user->can('edit-users')
            && $routeUser->branch_id == $user->branch_id
            && $routeUser->role_id != $role_admin;

    }

}
