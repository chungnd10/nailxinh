<?php

namespace App\Http\Controllers\Services;

use App\Services\ServiceServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\TypeOfService;
use App\Http\Requests\AddServiceRequest;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    protected $service_services;

    public function __construct(ServiceServices $service_services)
    {
        $this->service_services = $service_services;
    }

    public function index()
    {
        $services = $this->service_services->all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $type_of_services = TypeOfService::all();
        return view('admin.services.create', compact('type_of_services'));
    }

    public function store(AddServiceRequest $request)
    {
        // khai báo đối tượng
        $service = new Service();

        //nếu có nhập ảnh ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/service', $name);
            $service->image = $name;
        }

        $service->slug = Str::slug($request->name);
        //lưu
        $service->fill($request->all())->save();

        // xuất thông báo
        $notification = array(
            'message' => 'Thêm dịch vụ thành công !',
            'alert-type' => 'success'
        );

        //điều hướng
        return redirect()->route('services.index')->with($notification);
    }

    public function show($id)
    {
        $service = Service::find($id);
        $type_of_services = TypeOfService::all();
        return view('admin.services.show', compact('service', 'type_of_services'));
    }

    public function update(AddServiceRequest $request, $id)
    {
        // khai báo đối tượng
        $service = Service::find($id);

        //nếu có nhập ảnh ảnh
        if ($request->hasFile('image')) {

            // xoá ảnh cũ
            if (file_exists('upload/images/service/' . $service->image)
                && $service->image != 'services-default.png') {
                unlink('upload/images/service/' . $service->image);
            }

            //lưu ảnh mới
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/service', $name);
            $service->image = $name;

        }
        $service->slug = Str::slug($request->name);
        //lưu
        $service->fill($request->all())->save();

        // xuất thông báo
        $notify = array(
            'message' => 'Cập nhật dịch vụ thành công !',
            'alert-type' => 'success'
        );

        //điều hướng
        return redirect()->route('services.index')->with($notify);
    }

    public function destroy($id)
    {
        //tìm kiếm đối tượng
        $service = Service::find($id);
        // xoá ảnh cũ
        if (file_exists('upload/images/service/'.$service->image)
            && $service->image != 'services-default.png') {
            unlink('upload/images/service/'.$service->image);
        }
        // thực thi xóa
        $service->delete();

        //xuất thông báo
        $notify = array(
            'alert-type' => 'success',
            'message' => 'Xoá dịch vụ thành công !'
        );

        // điều hướng
        return redirect()->route('services.index')->with($notify);
    }
}
