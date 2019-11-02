<?php

namespace App\Services;

use App\Gender;

class GenderServices
{
    public function all()
    {
        $gender = Gender::all();
        return $gender;
    }
}
