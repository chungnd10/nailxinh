<?php
namespace App\Services;

use App\RestrictedList;

class RestrictedListServices
{
    public function all()
    {
        $list = RestrictedList::orderby('id', 'desc')->get();
        return $list;
    }

    public function find($id)
    {
        $list = RestrictedList::findOrFail($id);
        return $list;
    }

    public function checkLimitedList($phone_number)
    {
        $list = RestrictedList::where('phone_number', $phone_number)->count();
        return $list;
    }
}
