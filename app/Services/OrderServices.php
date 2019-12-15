<?php

namespace App\Services;

use App\Order;
use Illuminate\Support\Facades\DB;

class OrderServices
{
    public function all($paginate)
    {
        $current_user_id = \Auth::user()->id;
        $current_role_id = \Auth::user()->role_id;
        $current_branch_id = \Auth::user()->branch_id;

        $admin = config('contants.role_admin');
        $manager = config('contants.role_manager');
        $technician = config('contants.role_technician');
        $cashier = config('contants.role_cashier');
        $receptionist = config('contants.role_receptionist');

        $status_completed = config('contants.order_status_finish');
        $order_status_confirmed = config('contants.order_status_confirmed');
        $order_status_finish = config('contants.order_status_finish');

        $query = Order::join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at',
                DB::raw('group_concat(order_services.service_id) as service_id'));
            if($current_role_id != $admin){
               $query->where('branch_id', $current_branch_id);
            }

            if ($current_role_id == $cashier){
                $query->where('order_status_id', $status_completed);
            }

            if ($current_role_id == $technician){
                $query->where('user_id', $current_user_id);
                $query->where('order_status_id', $order_status_confirmed);
                $query->orwhere('user_id', $current_user_id);
                $query->where('order_status_id', $order_status_finish);
            }

            $query->groupBy(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at'
            );
            $query->orderby('orders.id', 'desc');

        $orders = $query->paginate($paginate);
        return $orders;
    }

    public function find($id)
    {
        $orders = Order::join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at',
                DB::raw('group_concat(order_services.service_id) as service_id'))
            ->groupBy(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at'
            )
            ->orderby('orders.id', 'desc')
            ->findOrFail($id);

        return $orders;
    }

    public function allWithBranch($branch_id)
    {
        $orders = Order::join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at',
                DB::raw('group_concat(order_services.service_id) as service_id'))
            ->where('branch_id', $branch_id)
            ->groupBy(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at'
            )
            ->orderby('orders.id', 'desc')
            ->get();

        return $orders;
    }

    public function allWhereStatus($branch_id, $status)
    {
        $orders = Order::join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at',
                DB::raw('group_concat(order_services.service_id) as service_id'))
            ->where('branch_id', $branch_id)
            ->where('order_status_id', $status)
            ->groupBy(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at'
            )
            ->orderby('orders.id', 'desc')
            ->get();

        return $orders;
    }

    public function allOfTechnician($branch_id, $user_id, $status)
    {
        $orders = Order::join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at',
                DB::raw('group_concat(order_services.service_id) as service_id'))
            ->where('branch_id', $branch_id)
            ->where('user_id', $user_id)
            ->where('order_status_id', $status)
            ->groupBy(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at'
            )
            ->orderby('orders.id', 'desc')
            ->get();

        return $orders;
    }

    /*
     * Tim kiem nanng cao
     *
     */
    public function advancedSearch(
        $user_order,
        $order_status_id,
        $branch_id,
        $user_id,
        $start_date,
        $end_date,
        $paginate
    ) {

        $current_user_id = \Auth::user()->id;
        $current_role_id = \Auth::user()->role_id;
        $technician = config('contants.role_technician');
        $order_status_confirmed = config('contants.order_status_confirmed');
        $order_status_finish = config('contants.order_status_finish');

        $query_builder = Order::join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at',
                DB::raw('group_concat(order_services.service_id) as service_id'));
        if ($user_order == true) {
            $query_builder->where('phone_number', $user_order);
        }

        if ($order_status_id == true) {
            $query_builder->where('order_status_id', $order_status_id);
        }

        if ($branch_id == true) {
            $query_builder->where('branch_id', $branch_id);
        }

        if ($user_id == true) {
            $query_builder->where('user_id', $user_id);
        }

        if ($start_date == true) {
            $query_builder->where('time','>', $start_date);
        }

        if ($end_date == true) {
            $query_builder->where('time', '<', $end_date);
        }

        if ($current_role_id == $technician){
                $query_builder->where('user_id', $current_user_id);
                $query_builder->where('order_status_id', $order_status_confirmed);
                $query_builder->orwhere('user_id', $current_user_id);
                $query_builder->where('order_status_id', $order_status_finish);
        }

        $query_builder->groupBy(
            'orders.id',
            'full_name',
            'phone_number',
            'time',
            'note',
            'updated_by',
            'branch_id',
            'user_id',
            'order_status_id',
            'orders.created_at',
            'orders.updated_at'
        )->orderby('orders.id', 'desc');
        $orders = $query_builder->paginate($paginate);

        return $orders;
    }

    public function count()
    {
        $order = Order::count();

        return $order;
    }

    //đếm số lịch đặt theo tháng
    public function countOrderWithMonths()
    {
        $order = array();

        for ($i = 1; $i < 13; $i++) {
            $order[] = Order::whereMonth('time', $i)
                ->whereYear('time', date('Y'))
                ->count();
        }

        $order = implode(',', $order);
        return rtrim($order, ',');
    }

    //đếm số lịch đặt đã hoàn thành theo tháng
    public function countOrderWithMonthsCompleted()
    {
        $order = array();

        for ($i = 1; $i < 13; $i++) {
            $order[] = Order::whereMonth('time', $i)
                ->whereYear('time', date('Y'))
                ->where('order_status_id', 4)
                ->count();
        }

        $order = implode(',', $order);
        return rtrim($order, ',');
    }

    /*
     * Check nhan vien da dat lich
     *
     */
    public function checkExsitsOrder($user_id, $date_time)
    {
        $order = Order::where('time', $date_time)
            ->where('user_id', $user_id)
            ->count();
        return $order;
    }
}
