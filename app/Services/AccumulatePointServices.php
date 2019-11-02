<?php
namespace App\Services;

use App\AccumulatePoints;

class AccumulatePointServices
{
    public function all()
    {
        $points = AccumulatePoints::all();
        return $points;
    }
}
