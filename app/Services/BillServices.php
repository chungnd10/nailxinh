<?php

namespace App\Services;

use App\Bill;
use Illuminate\Support\Facades\DB;

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

    /*
     * Lấy tất cả bảng hóa đơn join order join order_services
     *
     */
    public function getAllBillJoinOrderJoinOrderServices($order_by)
    {
        $bills = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
            ->join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'orders.note',
                'created_by',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at',
                DB::raw('group_concat(order_services.service_id) as service_id'))
            ->groupBy(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'orders.note',
                'created_by',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at'
            )
            ->orderby('orders.id', $order_by)
            ->get();

        return $bills;
    }

    /*
     * Xem chi chiet 1 hoa don
     *
     */
    public function show($bill_id)
    {
        $bill = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
            ->join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'branch_id',
                DB::raw('group_concat(order_services.service_id) as service_id'))
            ->groupBy(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'branch_id'
                )
            ->where('bills.id', $bill_id)
            ->firstOrFail();
        return $bill;
    }
}
