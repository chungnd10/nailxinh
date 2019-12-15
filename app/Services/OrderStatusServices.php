<?php

namespace App\Services;

use App\OrderStatus;

class OrderStatusServices
{
    public function all($order_by)
    {
        $status = OrderStatus::orderBy('id', $order_by)
            ->get();
        return $status;
    }

    public function forTechnician()
    {
        $status = array(
            config('contants.order_status_confirmed'),
            config('contants.order_status_finish'),
        );
        $status = OrderStatus::whereIn('id', $status)->get();
        return $status;
    }

    public function forReceptionist()
    {
        $status = array(
            config('contants.order_status_finish'),
        );
        $status = OrderStatus::whereNotIn('id', $status)->get();
        return $status;
    }
}
