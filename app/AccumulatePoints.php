<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccumulatePoints extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accumulate_points';

    protected $primaryKey = 'phone_number';

    public function membership_type()
    {
        return $this->belongsTo(MembershipType::class);
    }

    public function membershipType($money)
    {

        $membership_type = MembershipType::all();

        foreach ($membership_type as $membershipType) {
            if ($money <= $membershipType->money_level) {
                $title =  $membershipType->title;
            }
        }

        return $title;
    }
}
