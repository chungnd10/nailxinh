<?php

namespace App\Http\Controllers\Introduction;

use App\Http\Requests\IntroductionRequest;
use App\Introduction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroductionController extends Controller
{
    public function index($id)
    {
        $item = Introduction::find($id);
        return view('admin.introductions.index', compact('item'));
    }

    public function update(IntroductionRequest $request, $id)
    {
        $item = Introduction::find($id);

        //nếu có nhập ảnh ảnh
        if ($request->hasFile('image')) {
            // xoá ảnh cũ
            if (file_exists('upload/images/introductions/'.$item->image) && $item->image != 'img-default.png')
            {
                unlink('upload/images/introductions/'.$item->image);
            }
            //lưu ảnh mới
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/introductions', $name);
            $item->image = $name;
        }

        $item->fill($request->all())->save();

        $notify = array(
            'message' => 'Cập nhật thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('introductions.index', $id)->with($notify);
    }
}
