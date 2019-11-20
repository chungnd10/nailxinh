<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bills';

    protected $fillable = [
      'note',
      'time',
      'bill_status_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function billStatus()
    {
        return $this->belongsTo(BillStatus::class);
    }

    // lay ten 1 user
    public function getNameUser($user_id)
    {
        $user = User::where('id', $user_id)->select('full_name')->get();

        return $user->first()->full_name;
    }


}
