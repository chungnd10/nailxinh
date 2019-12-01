<?php

namespace App\Http\Controllers\Slides;

use App\Http\Requests\AddSlideRequest;
use App\Slides;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlidesController extends Controller
{

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

        if ($request->hasFile('images'))
        {
            $file = $request->file('images');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/slides', $name);
            $slide->images = $name;
        }

        $slide->fill($request->all())->save();

        return redirect()->route('slides.index')->with('toast_success', 'Thêm thành công !');
    }

    public function show($id)
    {
        $slide = $this->slide_services->find($id);

        $display_status = $this->display_status_services->all();

        return view('admin.slides.show', compact('display_status', 'slide'));
    }

    public function update(AddSlideRequest $request, $id)
    {
        $slide = $this->slide_services->find($id);

        if ($request->hasFile('images'))
        {
            if (file_exists('upload/images/slides/'.$slide->images)
                && $slide->images != 'slide-default.png')
            {
                unlink('upload/images/slides/'.$slide->images);
            }

            $file = $request->file('images');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/slides', $name);
            $slide->images = $name;
        }

        $slide->fill($request->all())->save();

        return redirect()->route('slides.index')->with('toast_success', 'Cập nhật thành công !');
    }

    public function destroy($id)
    {
        $slide = $this->slide_services->find($id);

        if (file_exists('upload/images/slides/'.$slide->images)
            && $slide->images != 'slide-default.png')
        {
            unlink('upload/images/slides/'.$slide->images);
        }

        $slide->delete();

        return redirect()->route('slides.index')->with('toast_success', 'Xoá thành công !');
    }

    //changeStatus AJAX
    public function changeStatus(Request $request)
    {
        $id = head(\Hashids::decode($request->id));

        $slide = $this->slide_services->find($id);

        $slide->display_status_id = $request->display_status_id;

        $slide->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
