<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Service;
use App\Http\Requests\AddServiceRequest;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    public function index()
    {
        $services = $this->service_services->all();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $type_of_services = $this->type_services->all();

        return view('admin.services.create', compact('type_of_services'));
    }

    public function store(AddServiceRequest $request)
    {
        $service = new Service();

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/service', $name);
            $service->image = $name;
        }

        $service->slug = Str::slug($request->name);

        $service->fill($request->all())->save();

        $notification = notification('success', 'Thêm thành công !');

        return redirect()->route('services.index')->with($notification);
    }

    public function show($id)
    {
        $service = $this->service_services->find($id);

        $type_of_services = $this->type_services->all();

        return view('admin.services.show', compact('service', 'type_of_services'));
    }

    public function update(AddServiceRequest $request, $id)
    {
        $service = $this->service_services->find($id);

        if ($request->hasFile('image'))
        {
            if (file_exists('upload/images/service/'.$service->image)
                && $service->image != 'services-default.png')
            {
                unlink('upload/images/service/'.$service->image);
            }
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/service', $name);
            $service->image = $name;
        }

        $service->slug = Str::slug($request->name);

        $service->fill($request->all())->save();

        $notification = notification('success', 'Cập nhật thành công !');

        return redirect()->route('services.index')->with($notification);
    }

    public function destroy($id)
    {
        $service = $this->service_services->find($id);

        if (file_exists('upload/images/service/'.$service->image)
            && $service->image != 'services-default.png')
        {
            unlink('upload/images/service/'.$service->image);
        }
        $service->delete();

        $notification = notification('success', 'Xoá thành công !');

        return redirect()->route('services.index')->with($notification);
    }
}
