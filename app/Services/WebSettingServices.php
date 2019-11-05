<?php

namespace App\Services;

use App\WebSetting;

class WebSettingServices
{
    public function all()
    {
        $info = WebSetting::find(1);
        return $info;
    }
}
