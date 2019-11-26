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

    public function find($id)
    {
        $bills = Bill::findOrFail($id);
        return $bills;
    }

    public function getOneWithOrderId($order_id)
    {
        $bills = Bill::where('order_id', $order_id)->get();
        return $bills;
    }

    public function getBilJoinOrderWithBillId($bill_id)
    {
        $bill_order = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
            ->select('bills.id',
                    'total_price',
                    'total_payment',
                    'discount',
                    'bills.note',
                    'order_id',
                    'bill_status_id',
                    'full_name',
                    'phone_number',
                    'time',
                    'branch_id',
                    'user_id',
                    'service_id',
                    'order_status_id'
            )
            ->where('bills.id', $bill_id)
            ->first();
        return $bill_order;
    }
}
