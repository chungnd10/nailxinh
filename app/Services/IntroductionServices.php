<?php
namespace App\Services;

use App\Introduction;

class IntroductionServices
{
    public function find($id)
    {
        $introduction = Introduction::find($id);
        return $introduction;
    }
}
