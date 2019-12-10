<?php

namespace App\Http\Controllers\WebSettings;

use App\Http\Requests\WebSettingRequest;
use App\Http\Controllers\Controller;

class WebSettingsController extends Controller
{
    /*
     * Show page index
     *
     */
    public function index()
    {
        $item = $this->web_setting_services->first();
        return view('admin.web_settings.index', compact('item'));
    }

    /*
     * Update webstting
     *
     */
    public function update(WebSettingRequest $request)
    {
        $item = $this->web_setting_services->first();

        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/web_settings', $name);
            $item->logo = $name;
        }

        $item->fill($request->all())->save();
        return redirect()->route('admin.index')->with('toast_success', 'Cập nhật thành công !');
    }
}
