<?php
namespace App\Services;

use App\Bill;

class BillServices
{
    public function all($orderby)
    {
        $bills = Bill::orderBy('id', $orderby)->get();
        return $bills;
    }

    public function getOneWithOrderId($order_id)
    {
        $bills = Bill::where('order_id', $order_id)->get();
        return $bills;
    }
}
