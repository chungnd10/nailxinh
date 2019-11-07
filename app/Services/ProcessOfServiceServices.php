<?php

namespace App\Services;

use App\ProcessOfService;

class ProcessOfServiceServices
{
    public function all()
    {
        $process = ProcessOfService::all();
        return $process;
    }

    public function find($id)
    {
        $process = ProcessOfService::find($id);
        return $process;
    }
    // lấy tất cả quy trình dịch vụ theo loại dịch vụ
    public function getProcessWithType($type_services)
    {
        $process = ProcessOfService::where('type_of_services_id', $type_services)->orderby('step', 'asc')->get();
        return $process;
    }
}
