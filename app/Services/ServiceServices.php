<?php

namespace App\Services;

use App\Service;

class ServiceServices
{
    //đếm số dịch vụ
    public function count()
    {
        $service = Service::count();
        return $service;
    }

    // lấy tất cả dịch vụ
    public function all()
    {
        $service = Service::all();
        return $service;
    }

}
