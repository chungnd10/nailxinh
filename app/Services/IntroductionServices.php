<?php
namespace App\Services;

use App\Introduction;

class IntroductionServices
{
    public function first()
    {
        $introduction = Introduction::first();
        return $introduction;
    }
}
