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
}
