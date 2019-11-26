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
}
