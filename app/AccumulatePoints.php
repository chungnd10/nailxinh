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

    public function membership_type()
    {
        return $this->belongsTo(MembershipType::class);
    }
}
