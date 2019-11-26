<?php

namespace App\Services;

use App\ProcessOfService;

class ProcessOfServiceServices
{
    public function all()
    {
        $process = ProcessOfService::orderby('id', 'desc')->get();
        return $process;
    }

    public function find($id)
    {
        $process = ProcessOfService::findOrFail($id);
        return $process;
    }
    // lấy tất cả quy trình dịch vụ theo loại dịch vụ
    public function getProcessWithType($service_id)
    {
        $process = ProcessOfService::where('service_id', $service_id)->orderby('step', 'asc')->get();
        return $process;
    }
}
