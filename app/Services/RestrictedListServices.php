<?php
namespace App\Services;

use App\RestrictedList;

class RestrictedListServices
{
    public function all()
    {
        $list = RestrictedList::all();
        return $list;
    }
}