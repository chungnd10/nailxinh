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
}
