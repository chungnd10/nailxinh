<?php
namespace App\Services;

use App\MembershipType;

class MembershipTypeServices
{
    public function all()
    {
        $membership_type = MembershipType::orderby('discount_level','desc')->get();
        return $membership_type;
    }
}
