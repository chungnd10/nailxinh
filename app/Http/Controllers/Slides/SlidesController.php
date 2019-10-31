<?php

namespace App\Http\Controllers\Slides;

use App\DisplayStatus;
use App\Http\Requests\AddSlideRequest;
use App\Slides;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlidesController extends Controller
{
    public function index()
    {
        $slides= Slides::paginate(10);
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        $display_status = DisplayStatus::all();
        return view('admin.slides.create', compact( 'display_status'));
    }

    public function store(AddSlideRequest $request)
    {
        $slide = new Slides();

        //nếu có nhập ảnh ảnh
        if ($request->hasFile('images')) {
            // xoá ảnh cũ
            if (file_exists('upload/images/slides/'.$slide->images) && $slide->images != 'slide-default.png')
            {
                unlink('upload/images/slides/'.$slide->images);
            }
            //lưu ảnh mới
            $file = $request->file('images');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/slides', $name);
            $slide->images = $name;
        }

        $slide->fill($request->all())->save();

        $notify = array(
            'message' => 'Thêm slide thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('slides.index')->with($notify);
    }

    //hiển thị để sửa
    public function show($id)
    {
        $slide = Slides::find($id);
        $display_status = DisplayStatus::all();
        return view('admin.slides.show', compact( 'display_status', 'slide'));
    }

    //update
    public function update(AddSlideRequest $request, $id)
    {
        $slide = Slides::find($id);

        //nếu có nhập ảnh
        if ($request->hasFile('images')) {
            // xoá ảnh cũ
            if (file_exists('upload/images/slides/'.$slide->images) && $slide->images != 'slide-default.png')
            {
                unlink('upload/images/slides/'.$slide->images);
            }

            //lưu ảnh mới
            $file = $request->file('images');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/slides', $name);
            $slide->images = $name;
        }

        $slide->fill($request->all())->save();

        $notify = array(
            'message' => 'Sửa slide thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('slides.index')->with($notify);
    }

    //xóa slide
    public function destroy($id)
    {
        $slide = Slides::find($id);
        $slide->delete();

        $notify = array(
            'message' => 'Xóa slide thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('slides.index')->with($notify);
    }
}
