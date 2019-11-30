<?php

namespace App\Services;

use App\WebSetting;

class WebSettingServices
{
    public function first()
    {
        $info = WebSetting::first();
        return $info;
    }

}
