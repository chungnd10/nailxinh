<?php

namespace App\Services;

use App\TypeOfService;

class TypeServiceServices
{
    // đếm số loại dịch vụ
    public function count()
    {
        $type = TypeOfService::count();
        return $type;
    }
}
