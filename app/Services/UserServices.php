<?php

namespace App\Services;

use App\User;
use Config;

class UserServices
{
    // đếm số user
    public function count()
    {
        $user = User::count();
        return $user;
    }

    //lấy tất cả user
    public function all()
    {
        $user = User::all();
        return $user;
    }

    // lấy tất cả user trừ admin
    public function allAndNotAdmin()
    {
        $role_admin = config('contants.role_admin');
        $user = User::where('role_id','<>', $role_admin)->get();
        return $user;
    }

    //lấy user theo chi nhánh
    public function getUserWithBranch($branch_id)
    {
        $role_admin = config('contants.role_admin');

        $user = User::where('branch_id',$branch_id)
                ->where('role_id','<>', $role_admin)
                ->get();
        return $user;
    }

}
