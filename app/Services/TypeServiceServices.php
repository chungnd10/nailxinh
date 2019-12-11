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
    public function all($order_by)
    {
        $type = TypeOfService::orderby('id', $order_by)
            ->get();
        return $type;
    }

    public function find($id){
        $type = TypeOfService::findOrFail($id);
        return $type;
    }
}
