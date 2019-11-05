<?php

namespace App\Http\Controllers\TypeServices;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTypeServiceRequest;
use App\TypeOfService;
use Illuminate\Support\Str;

class TypeServicesController extends Controller
{
    public function index()
    {
    	//lấy dữ liệu
        $type_services = TypeOfService::all();
        // điều hướng
        return view('admin.type_services.index', compact('type_services'));
    }

    public function create()
    {
    	return view('admin.type_services.create');
    }

    public function store(AddTypeServiceRequest $request)
    {
    	// khai báo đối tượng
        $type_of_service = new TypeOfService();

        //nếu có nhập ảnh ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/type_services', $name);
            $type_of_service->image = $name;
        }

        $type_of_service->slug = Str::slug($request->name);
        //lưu
        $type_of_service->fill($request->all())->save();

        // xuất thông báo
        $notification = array(
            'message' => 'Thêm loại dịch vụ thành công !',
            'alert-type' => 'success'
        );

        //điều hướng
        return redirect()->route('type-services.index')->with($notification);
    }

    public function show($id)
    {
        // tìm kiếm đối tượng
        $type_of_service = TypeOfService::find($id);

        // điều hướng
        return view('admin.type_services.show', compact('type_of_service'));
    }

    public function update(AddTypeServiceRequest $request, $id)
    {
        // khai báo đối tượng
       $type_of_service = TypeOfService::find($id);

        //nếu có nhập ảnh ảnh
        if ($request->hasFile('image')) {

            // xoá ảnh cũ
            if (file_exists('upload/images/type_services/'.$type_of_service->image)
                && $type_of_service->image != 'type_of_services_default.png')
            {
                unlink('upload/images/type_services/'.$type_of_service->image);
            }

            //lưu ảnh mới
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/type_services', $name);
            $type_of_service->image = $name;

        }

        //lưu
        $type_of_service->fill($request->all())->save();

        // xuất thông báo
        $notify = array(
            'message' => 'Cập nhật loại dịch vụ thành công !',
            'alert-type' => 'success'
        );

        //điều hướng
        return redirect()->route('type-services.index')->with($notify);
    }

    public function destroy($id)
    {
        //tìm kiếm đối tượng
        $type_of_service = TypeOfService::find($id);

        // xoá ảnh cũ
        if (file_exists('upload/images/type_services/'.$type_of_service->image)
            && $type_of_service->image != 'type_of_services_default.png') {
            unlink('upload/images/type_services/'.$type_of_service->image);
        }
        // thực thi xóa
        $type_of_service->delete();

        //xuất thông báo
        $notify = array(
            'alert-type' => 'success',
            'message' => 'Xoá loại dịch vụ thành công !'
        );

        // điều hướng
        return redirect()->route('type-services.index')->with($notify);
    }

}
