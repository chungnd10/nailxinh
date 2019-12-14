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
    public function allForAdmin($order_by)
    {
        $role_admin = config('contants.role_admin');
        $role = Role::where('id', '<>', $role_admin)
            ->orderBy('id', $order_by)
            ->get();
        return $role;
    }

    public function allForManager($order_by)
    {
        $role_admin = config('contants.role_admin');
        $role_manager = config('contants.role_manager');

        $role = Role::where('id', '<>', $role_admin)
            ->where('id', '<>', $role_manager)
            ->orderBy('id', $order_by)
            ->get();
        return $role;
    }
}
