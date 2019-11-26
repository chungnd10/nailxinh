<?php

namespace App\Services;

use App\Service;
use App\UserServices;

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
        $service = Service::orderby('id', 'desc')->get();
        return $service;
    }

    public function find($id)
    {
        $service = Service::findOrFail($id);
        return $service;
    }

    // lấy ra những dịch vụ mà ktv đó có thể làm
    public function getSkillOfTechnician($user_id)
    {
        return UserServices::where('user_id', $user_id)->get();
    }

    // lấy giá của tất cả dịch vụ đã sử dụng
    public function getPriceWithServices($services_id)
    {
        $service_price =   Service::whereIn('id',$services_id)->get();
        return array_sum($service_price->pluck('price')->toArray());
    }
}
