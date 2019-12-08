<?php
namespace App\Services;

use App\AccumulatePoints;

class AccumulatePointServices
{
    public function all()
    {
        $points = AccumulatePoints::orderby('created_at', 'desc')->get();
        return $points;
    }

    public function find($id)
    {
        $points = AccumulatePoints::findOrFail($id);
        return $points;
    }

    //lấy tiền tích điểm của khách
    public function getPointsOfGuest($phone_number)
    {
        $accumulate = AccumulatePoints::where('phone_number', $phone_number)->get();
        if ($accumulate->first()){
            return $accumulate->first()->total_money;
        }else{
            return null;
        }

    }

    // lấy thông tin tích điểm của khách theo số điện thoại
    public function getAccumulateWithPhoneNumber($phone_number)
    {
         $accumulate = AccumulatePoints::where('phone_number', $phone_number)->first();
         return $accumulate;
    }


}
