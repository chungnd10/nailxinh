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
        $user = User::orderby('id', 'desc')->get();
        return $user;
    }

    public function find($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    // lấy tất cả user trừ admin
    public function allForAdmin()
    {
        $role_admin = config('contants.role_admin');
        $user = User::where('role_id','<>', $role_admin)->orderby('id', 'desc')->get();
        return $user;
    }


    //lấy user theo chi nhánh va trừ admin quan ly chi nhanh
    public function allForManager($branch_id)
    {
        $role_admin = config('contants.role_admin');
        $role_manager = config('contants.role_manager');

        $user = User::where('branch_id',$branch_id)
                ->where('role_id','<>', $role_admin)
                ->where('role_id','<>', $role_manager)
                ->get();
        return $user;
    }

    //lấy tất cả kỹ thuật viên có trạng thái là hiển thị
    public function getTechnician()
    {
        $status = config('contants.display_status_display');
        $role_technician = config('contants.role_technician');
        $users = User::where('role_id', $role_technician)
            ->where('display_status_id', $status)
            ->orderby('id', 'desc')
            ->get();
        return $users;
    }

    public function getUsersWithBranch($branch_id)
    {
        $role_technician = config('contants.role_technician');
        $users = User::where('role_id', $role_technician)
            ->where('branch_id', $branch_id)
            ->orderby('id', 'desc')
            ->get();
        return $users;
    }
}
