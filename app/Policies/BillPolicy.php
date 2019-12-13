<?php

namespace App\Policies;

use App\Bill;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillPolicy
{
    use HandlesAuthorization;

    /**
     * Chỉ được chỉnh sửa hóa đơn khi có quyền và chưa thanh toán
     * @param \App\User $user
     * @return mixed
     */
    public function update(User $user, Bill $bill)
    {
        $bill_status_unpaid = config('contants.bill_status_unpaid');
        return $user->can('update-bills') && $bill->bill_status_id == $bill_status_unpaid;
    }
}
