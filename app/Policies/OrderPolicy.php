<?php

namespace App\Policies;

use App\Order;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Nếu là KTV thì chỉ được sử lịch đặt của minh
     *
     * @return mixed
     */
    public function show(User $user, Order $order, $bill_status_id)
    {
        $role_technician = config('contants.role_technician');
        $khong_co_lich_dat = 0;
        if ($user->role_id == $role_technician) {
            //nếu là KTV
            return $user->can('update-orders')
                && $user->id == $order->user_id
                && $bill_status_id == $khong_co_lich_dat;
        }
        return $user->can('update-orders') && $bill_status_id == $khong_co_lich_dat;
    }

    public function update(User $user, Order $order, $bill_status_id)
    {
        $role_technician = config('contants.role_technician');
        $bill_status_unpaid = config('contants.bill_status_unpaid');

        if ($user->role_id == $role_technician) {
            //nếu là KTV
            return $user->can('update-orders')
                && $user->id == $order->user_id
                && $bill_status_id == $bill_status_unpaid;
        }
        return $user->can('update-orders') && $bill_status_id == $bill_status_unpaid;
    }
}
