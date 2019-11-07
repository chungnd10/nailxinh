<?php
namespace App\Services;

use App\City;

class CityServices
{
    public function all()
    {
        $city = City::all();
        return $city;
    }
}
