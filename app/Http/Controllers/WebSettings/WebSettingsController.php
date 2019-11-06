<?php

namespace App\Http\Controllers\WebSettings;

use App\Http\Requests\WebSettingRequest;
use App\WebSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebSettingsController extends Controller
{
    // hiển thị thông tin
    public function index($id)
    {
        //tìm đối tượng
        $item = WebSetting::find($id);
        // điều hướng
        return view('admin.web_settings.index', compact('item'));
    }

    // cập nhật thông tin
    public function update(WebSettingRequest $request, $id)
    {
        // tìm đối tượng
        $item = WebSetting::find($id);
        //nếu có nhập ảnh ảnh
        if ($request->hasFile('avatar')) {
            // xoá ảnh cũ
            if (file_exists('upload/images/web_settings/'.$item->logo) && $item->logo != 'logo-default.png')
            {
                unlink('upload/images/web_settings/'.$item->logo);
            }
            //lưu ảnh mới
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/web_settings', $name);
            $item->logo = $name;
        }
        //lưu
        $item->fill($request->all())->save();
        // thông báo
        $notify = array(
            'message' => 'Cập nhật thông tin thành công',
            'alert-type' => 'success'
        );
        // điều hướng
        return redirect()->route('admin.index')->with($notify);
    }
}
