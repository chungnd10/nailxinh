<?php

namespace App\Services;

use App\UserTypeServices;

class UserTypeServiceServices
{
    //lấy danh sách loại dịch vụ theo id
    public function getTypeServicesOfUser($id)
    {
        $type_services = UserTypeServices::where('user_id', $id)->get();
        return $type_services;
    }
}
