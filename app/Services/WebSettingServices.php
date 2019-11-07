<?php

namespace App\Services;

use App\WebSetting;

class WebSettingServices
{
    public function all()
    {
        $info = WebSetting::find(config('contants.web_settings'));
        return $info;
    }

    public function find($id)
    {
        $info = WebSetting::find($id);
        return $info;
    }
}
