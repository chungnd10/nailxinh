<?php

namespace App\Services;

use App\WebSetting;

class WebSettingServices
{
    public function find($id)
    {
        $info = WebSetting::find($id);
        return $info;
    }
}
