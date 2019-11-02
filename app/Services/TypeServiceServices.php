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

    // lấy tất cả loại dịch vụ
    public function all()
    {
        $type = TypeOfService::all();
        return $type;
    }
}
