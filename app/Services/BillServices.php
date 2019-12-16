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
    public function getAllBillJoinOrderJoinOrderServices($order_by, $paginate)
    {
        $current_user_id = \Auth::user()->id;
        $current_role_id = \Auth::user()->role_id;
        $current_branch_id = \Auth::user()->branch_id;

        $admin = config('contants.role_admin');
        $manager = config('contants.role_manager');
        $technician = config('contants.role_technician');
        $cashier = config('contants.role_cashier');
        $receptionist = config('contants.role_receptionist');

        $query = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
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
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'bills.created_at',
                'bills.updated_at',
                DB::raw('group_concat(order_services.service_id) as service_id'));
        if ($current_role_id == $manager || $cashier){
            $query->where('branch_id', $current_branch_id);
        }
        $query->groupBy(
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
            'updated_by',
            'branch_id',
            'user_id',
            'order_status_id',
            'bills.created_at',
            'bills.updated_at'
        );
        $query->orderby('orders.id', $order_by);

        $bills =$query->paginate($paginate);
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
                'payment_by',
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
                'payment_by',
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

    /*
     * advancedSearch
     *
     */
    public function advancedSearch($phone_number, $start_date, $end_date, $paginate)
    {
        $role_admin = config('contants.role_admin');
        $current_role_id = \Auth::user()->role_id;
        $current_branch_id = \Auth::user()->branch_id;

         $query = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
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
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'bills.created_at',
                'bills.updated_at',
                DB::raw('group_concat(order_services.service_id) as service_id'));

            if ($phone_number != null){
                $query->where('phone_number', $phone_number);
            }

            if ($start_date != null){
                $query->where('bills.created_at','>=' , $start_date);
            }

            if ($end_date != null){
                $query->where('bills.created_at','<=' , $end_date);
            }

            if ($current_role_id != $role_admin){
                 $query->where('branch_id', $current_branch_id);
            }

            $query->groupBy(
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
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'bills.created_at',
                'bills.updated_at'
            );
            $query->orderby('bills.id', 'desc');

        $bills = $query->paginate($paginate);
        return $bills;
    }
}
