<?php
namespace App\Services;

use App\UserServices;
class UserServiceServices
{
    //lấy tất cả dịch vụ theo id người dùng
    public function getServiceWithId($id)
    {
        $service = UserServices::where('user_id', $id)->get();
        return $service;
    }
}
