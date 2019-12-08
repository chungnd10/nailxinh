<?php

namespace App\Services;

use App\OrderStatus;

class OrderStatusServices
{
    public function all()
    {
        $status = OrderStatus::all();
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
