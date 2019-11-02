<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
    protected $table = 'membership_type';

    protected $fillable = [
      'title',
      'description',
      'money_level',
      'discount_level'
    ];

}
