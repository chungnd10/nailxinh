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

        if ($request->hasFile('images'))
        {
            $file = $request->file('images');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/slides', $name);
            $slide->images = $name;
        }

        $slide->fill($request->all())->save();

        $notification = notification('success', 'Thêm thành công !');

        return redirect()->route('slides.index')->with($notification);
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

        $notification = notification('success', 'Sửa thành công !');

        return redirect()->route('slides.index')->with($notification);
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

        $notification = notification('success', 'Xóa thành công !');

        return redirect()->route('slides.index')->with($notification);
    }

    //changeStatus AJAX
    public function changeStatus(Request $request)
    {
        $slide = $this->slide_services->find($request->id);

        $slide->display_status_id = $request->display_status_id;

        $slide->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
