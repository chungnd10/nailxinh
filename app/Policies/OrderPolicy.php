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
    public function update(User $user, Order $order)
    {
        $role_technician = config('contants.role_technician');
        if ($user->role_id == $role_technician) {
            return $user->can('update-orders') && $user->id == $order->user_id;
        }
        return $user->can('update-orders');
    }
}
