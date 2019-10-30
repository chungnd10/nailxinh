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
    public function allNotAdmin()
    {
        $role_admin = Config::get('contants.role_admin');
        $role = Role::where('id', '<>', $role_admin)->get();
        return $role;
    }
}
