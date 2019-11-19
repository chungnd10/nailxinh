<?php
namespace App\Services;

use App\AccumulatePoints;

class AccumulatePointServices
{
    public function all()
    {
        $points = AccumulatePoints::orderby('id', 'desc')->get();
        return $points;
    }

    public function find($id)
    {
        $points = AccumulatePoints::find($id);
        return $points;
    }

    //lấy tiền tích điểm của khách
    public function getPointsOfServices($phone_number)
    {
        $accumulate = AccumulatePoints::where('phone_number', $phone_number)->get();
        if ($accumulate->first()){
            return $accumulate->first()->total_money;
        }else{
            return null;
        }

    }


}
