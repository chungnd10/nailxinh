<?php

namespace App\Http\Controllers\Introduction;

use App\Http\Requests\IntroductionRequest;
use App\Introduction;
use App\Services\IntroductionServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroductionController extends Controller
{
    protected $introduction_services;

    public function __construct( IntroductionServices $introduction_services)
    {
        $this->introduction_services = $introduction_services;
    }

    public function index($id)
    {
        $item = $this->introduction_services->find($id);
        return view('admin.introductions.index', compact('item'));
    }

    public function update(IntroductionRequest $request, $id)
    {
        $item = $this->introduction_services->find($id);

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
