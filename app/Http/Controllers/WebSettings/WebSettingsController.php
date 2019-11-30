<?php

namespace App\Http\Controllers\WebSettings;

use App\Http\Requests\WebSettingRequest;
use App\Http\Controllers\Controller;

class WebSettingsController extends Controller
{
    public function index()
    {
        $item = $this->web_setting_services->first();

        return view('admin.web_settings.index', compact('item'));
    }

    public function update(WebSettingRequest $request)
    {
        $item = $this->web_setting_services->first();

        if ($request->hasFile('avatar'))
        {
            if (file_exists('upload/images/web_settings/'.$item->logo)
                && $item->logo != 'logo-default.png')
            {
                unlink('upload/images/web_settings/'.$item->logo);
            }

            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/web_settings', $name);
            $item->logo = $name;
        }

        $item->fill($request->all())->save();

        return redirect()->route('admin.index')->with('toast_success', 'Cập nhật thành công !');
    }
}
