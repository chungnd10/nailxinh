<?php

namespace App\Http\Controllers\Slides;

use App\DisplayStatus;
use App\Http\Requests\AddSlideRequest;
use App\Services\DisplayStatusServices;
use App\Services\SlideServices;
use App\Slides;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlidesController extends Controller
{
    protected $slide_services;
    protected $display_status_services;

    public function  __construct(
        SlideServices $slide_services,
        DisplayStatusServices $display_status_services
    )
    {
        $this->slide_services = $slide_services;
        $this->display_status_services = $display_status_services;
    }

    public function index()
    {
        $slides = $this->slide_services->all();
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        $display_status = $this->display_status_services->all();
        return view('admin.slides.create', compact('display_status'));
    }

    public function store(AddSlideRequest $request)
    {
        $slide = new Slides();

        //nếu có nhập ảnh ảnh
        if ($request->hasFile('images')) {

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
        $slide = $this->slide_services->find($id);
        $display_status = $this->display_status_services->all();
        return view('admin.slides.show', compact('display_status', 'slide'));
    }

    //update
    public function update(AddSlideRequest $request, $id)
    {
        $slide = $this->slide_services->find($id);

        //nếu có nhập ảnh
        if ($request->hasFile('images')) {
            // xoá ảnh cũ
            if (file_exists('upload/images/slides/' . $slide->images) && $slide->images != 'slide-default.png') {
                unlink('upload/images/slides/' . $slide->images);
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
        $slide = $this->slide_services->find($id);
        $slide->delete();

        $notify = array(
            'message' => 'Xóa slide thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('slides.index')->with($notify);
    }

    //changeStatus
    public function changeStatus(Request $request)
    {
        $slide = $this->slide_services->find($request->id);
        $slide->display_status_id = $request->display_status_id;
        $slide->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
