<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserServices extends Model
{
    protected $table = 'user_services';

    protected $fillable =[
      'service_id',
      'user_id'
    ];
}
