<?php

namespace App\Services;

use App\Role;
use Config;

class RoleServices
{
    //lấy tất cả role
    public function all()
    {
        $role = Role::all();
        return $role;
    }

    //lấy tất cả role trừ admin
    public function allForAdmin()
    {
        $role_admin = config('contants.role_admin');
        $role = Role::where('id', '<>', $role_admin)->get();
        return $role;
    }

    public function allForManager()
    {
        $role_admin = config('contants.role_admin');
        $role_manager = config('contants.role_manager');

        $role = Role::where('id', '<>', $role_admin)
            ->where('id', '<>', $role_manager)
            ->get();
        return $role;
    }
}
