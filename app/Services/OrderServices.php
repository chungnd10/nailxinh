<?php

namespace App\Services;

use App\Order;

class OrderServices
{
    // đếm số lịch đặt
    public function count()
    {
        $order = Order::count();
        return $order;
    }

    //đếm số lịch đặt theo tháng
    public function countOrderWithMonths(){
        $order = array();
        for ($i=  1; $i <13; $i++){
            $order[] = Order::whereMonth('time', $i)->count();
        }
        $order = implode(',', $order);
        return rtrim($order, ',');
    }

    //đếm số lịch đặt đã hoàn thành theo tháng
    public function countOrderWithMonthsCompleted(){
        $order = array();
        for ($i=  1; $i <13; $i++){
            $order[] = Order::whereMonth('time', $i)->where('order_status_id',4)->count();
        }
        $order = implode(',', $order);
        return rtrim($order, ',');
    }
}
