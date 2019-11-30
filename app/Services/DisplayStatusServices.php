<?php
namespace App\Services;

use App\DisplayStatus;

class DisplayStatusServices
{
    public function all()
    {
        $status = DisplayStatus::all();
        return $status;
    }
}
