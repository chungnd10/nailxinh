<?php

namespace App\Services;

use App\Order;
use Illuminate\Support\Facades\DB;

class OrderServices
{
    public function all()
    {
        $orders = Order::join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'created_by',
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
                'created_by',
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

    public function find($id)
    {
        $orders = Order::join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'created_by',
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
                'created_by',
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
                'created_by',
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
                'created_by',
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
                'created_by',
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
                'created_by',
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
                'created_by',
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
                'created_by',
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
        $end_date
    ) {
        $query_builder = Order::join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'full_name',
                'phone_number',
                'time',
                'note',
                'created_by',
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
            $query_builder->where('time', $start_date);
        }

        if ($end_date == true) {
            $query_builder->where('time', $end_date);
        }

        $query_builder->groupBy(
            'orders.id',
            'full_name',
            'phone_number',
            'time',
            'note',
            'created_by',
            'updated_by',
            'branch_id',
            'user_id',
            'order_status_id',
            'orders.created_at',
            'orders.updated_at'
        )->orderby('orders.id', 'desc');
        $orders = $query_builder->get();

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
}
