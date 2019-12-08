<?php

namespace App\Policies;

use App\Bill;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     * @param \App\User $user
     * @return mixed
     */
    public function update(User $user, Bill $bill)
    {
        $bill_status_unpaid = config('contants.bill_status_unpaid');
        return $user->can('update-bills') && $bill->bill_status_id == $bill_status_unpaid;
    }
}
