<?php
namespace App\Services;

use App\MembershipType;

class MembershipTypeServices
{
    public function all($order_by)
    {
        $membership_type = MembershipType::orderby('money_level', $order_by)->get();
        return $membership_type;
    }

    public function orderBy($order_by)
    {
        $membership_type = MembershipType::orderby('id', $order_by)->get();
        return $membership_type;
    }

}
