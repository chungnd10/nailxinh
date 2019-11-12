<?php

namespace App\Http\Controllers\Services;

use App\Services\ServiceServices;
use App\Services\TypeServiceServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\TypeOfService;
use App\Http\Requests\AddServiceRequest;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    protected $service_services;
    protected $type_services;

    public function __construct(
        ServiceServices $service_services,
        TypeServiceServices $type_services
    )
    {
        $this->service_services = $service_services;
        $this->type_services = $type_services;
    }

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

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/service', $name);
            $service->image = $name;
        }

        $service->slug = Str::slug($request->name);

        $service->fill($request->all())->save();

        $notification = array(
            'message' => 'Thêm dịch vụ thành công !',
            'alert-type' => 'success'
        );

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

        if ($request->hasFile('image')) {
            if (file_exists('upload/images/service/' . $service->image)
                && $service->image != 'services-default.png') {
                unlink('upload/images/service/' . $service->image);
            }

            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/service', $name);
            $service->image = $name;
        }
        $service->slug = Str::slug($request->name);

        $service->fill($request->all())->save();

        $notify = array(
            'message' => 'Cập nhật dịch vụ thành công !',
            'alert-type' => 'success'
        );

        return redirect()->route('services.index')->with($notify);
    }

    public function destroy($id)
    {
        $service = $this->service_services->find($id);
        if (file_exists('upload/images/service/'.$service->image)
            && $service->image != 'services-default.png') {
            unlink('upload/images/service/'.$service->image);
        }
        $service->delete();

        $notify = array(
            'alert-type' => 'success',
            'message' => 'Xoá dịch vụ thành công !'
        );

        return redirect()->route('services.index')->with($notify);
    }
}
