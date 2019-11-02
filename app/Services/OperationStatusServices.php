<?php
namespace App\Services;

use App\OperationStatus;

class OperationStatusServices
{
    public function all()
    {
        $status = OperationStatus::all();
        return $status;
    }
}
