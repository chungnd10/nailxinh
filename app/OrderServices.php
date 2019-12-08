<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderServices extends Model
{
    protected $table ='order_services';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
