<?php

namespace App\Services;

use App\Order;

class OrderServices
{
    public function all()
    {
        $orders = Order::orderby('id', 'desc')->get();

        return $orders;
    }

    public function find($id)
    {
        $orders = Order::find($id);

        return $orders;
    }

    public function allWithBranch($branch_id)
    {
        $orders = Order::where('branch_id', $branch_id)->orderby('id', 'desc')->get();

        return $orders;
    }

    public function allWhereStatus($branch_id, $status)
    {
        $orders = Order::where('branch_id', $branch_id)
                        ->where('order_status_id', $status)
                        ->orderby('id', 'desc')->get();

        return $orders;
    }

    public function allOfTechnician($branch_id, $user_id)
    {
        $orders = Order::where('branch_id', $branch_id)->where('user_id', $user_id)->orderby('id', 'desc')->get();

        return $orders;
    }

    public function count()
    {
        $order = Order::count();

        return $order;
    }

    //đếm số lịch đặt theo tháng
    public function countOrderWithMonths(){
        $order = array();

        for ($i=  1; $i <13; $i++){
            $order[] = Order::whereMonth('time', $i)->whereYear('time', date('Y'))->count();
        }

        $order = implode(',', $order);
        return rtrim($order, ',');
    }

    //đếm số lịch đặt đã hoàn thành theo tháng
    public function countOrderWithMonthsCompleted(){
        $order = array();

        for ($i=  1; $i <13; $i++){
            $order[] = Order::whereMonth('time', $i)->whereYear('time', date('Y'))->where('order_status_id',4)->count();
        }

        $order = implode(',', $order);
        return rtrim($order, ',');
    }
}
