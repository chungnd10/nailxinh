<?php

namespace App\Services;

use App\User;
use Config;
use Illuminate\Support\Facades\Auth;

class UserServices
{
    /*
     * Count all user
     *
     */
    public function count()
    {
        $user = User::count();
        return $user;
    }

    /*
     * Get all user
     *
     */
    public function all($order_by)
    {
        $user = User::orderby('id', $order_by)
            ->get();
        return $user;
    }

    /*
     * Find user
     *
     */
    public function find($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    /*
     * Get all except admin
     *
     */
    public function allForAdmin($order_by, $paginate)
    {
        $role_admin = config('contants.role_admin');

        $user = User::where('role_id', '<>', $role_admin)
            ->orderby('id', $order_by)
            ->paginate($paginate);
        return $user;
    }


    //lấy user theo chi nhánh va trừ admin quan ly chi nhanh
    public function allForManager($branch_id, $order_by, $paginate)
    {
        $role_admin = config('contants.role_admin');
        $role_manager = config('contants.role_manager');

        $user = User::where('branch_id', $branch_id)
            ->where('role_id', '<>', $role_admin)
            ->where('role_id', '<>', $role_manager)
            ->orderby('id', $order_by)
            ->paginate($paginate);
        return $user;
    }

    //lấy tất cả kỹ thuật viên có trạng thái là hiển thị
    public function getTechnicianWithStatus($status)
    {
        $operation_status_id  = config('contants.operation_status_active');
        $role_technician = config('contants.role_technician');
        $users = User::where('role_id', $role_technician)
            ->where('display_status_id', $status)
            ->where('operation_status_id', $operation_status_id)
            ->orderby('id', 'desc')
            ->get();
        return $users;
    }

    /*
     * Lấy tất cả kỹ thuật viên
     *
     */
    public function getTechnician($order_by){
        $role_technician = config('contants.role_technician');
        $users = User::where('role_id', $role_technician)
            ->orderby('id', $order_by)
            ->get();
        return $users;
    }

    /*
     * Lay ky thuat vien theo chi nhanh
     *
     */
    public function getTechnicianWithBranch($branch_id, $order_by)
    {
        $role_technician = config('contants.role_technician');
        $users = User::where('role_id', $role_technician)
            ->where('branch_id', $branch_id)
            ->orderby('id', $order_by)
            ->get();
        return $users;
    }

    /*
     * Tim kiem nang cao
     *
     */
    public function advancedSearch($full_name, $branch_id, $role_id, $order_by, $paginate)
    {
        $role_admin = config('contants.role_admin');
        $role_manager = config('contants.role_manager');

        $query_builder = User::orderBy('id', $order_by);

        if(Auth::user()->role_id != $role_admin){
            $query_builder->where('role_id', '<>', $role_admin);
            $query_builder->where('role_id', '<>', $role_manager);
        }

        if ($full_name != '') {
            $query_builder->where('full_name', 'like', '%' . $full_name . '%');
        }

        if ($branch_id != '') {
            $query_builder->where('branch_id', $branch_id);
        }

        if ($role_id != '') {
            $query_builder->where('role_id', $role_id);
        }

        if ($role_admin != '') {
            $query_builder->where('role_id', '<>', $role_admin);
        }

        $users = $query_builder->paginate($paginate);

        return $users;

    }
}
