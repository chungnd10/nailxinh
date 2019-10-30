<?php

namespace App\Services;

use App\User;

class UserServices
{
    // đếm số user
    public function count()
    {
        $user = User::count();
        return $user;
    }
}
