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
    public function all($paginate)
    {
        $user = User::paginate($paginate);
        return $user;
    }

    //lấy user theo chi nhánh
    public function getUserWithBranch($branch_id, $paginate)
    {
        $role_admin = Config::get('contants.role_admin');

        $user = User::where('branch_id',$branch_id)
                ->where('role_id','<>', $role_admin)
                ->paginate($paginate);
        return $user;
    }
}
