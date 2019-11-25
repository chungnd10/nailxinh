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
        $type_services = $this->type_services->all();

        return view('admin.type_services.index', compact('type_services'));
    }

    public function create()
    {
        return view('admin.type_services.create');
    }

    public function store(AddTypeServiceRequest $request)
    {
        $type_of_service = new TypeOfService();


        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/type_services', $name);
            $type_of_service->image = $name;
        }

        $type_of_service->slug = Str::slug($request->name);

        $type_of_service->fill($request->all())->save();

        $notification = notification('success', 'Thêm thành công !');

        return redirect()->route('type-services.index')->with($notification);
    }

    public function show($id)
    {
        $type_of_service = $this->type_services->find($id);

        return view('admin.type_services.show', compact('type_of_service'));
    }

    public function update(AddTypeServiceRequest $request, $id)
    {
        $type_of_service = $this->type_services->find($id);

        if ($request->hasFile('image'))
        {
            if (file_exists('upload/images/type_services/'.$type_of_service->image)
                && $type_of_service->image != 'type_of_services_default.png')
            {
                unlink('upload/images/type_services/'.$type_of_service->image);
            }
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/type_services', $name);
            $type_of_service->image = $name;
        }

        $type_of_service->fill($request->all())->save();

        $notification = notification('success', 'Cập nhật thành công !');

        return redirect()->route('type-services.index')->with($notification);
    }

    public function destroy($id)
    {
        $type_of_service = $this->type_services->find($id);

        if (file_exists('upload/images/type_services/'.$type_of_service->image)
            && $type_of_service->image != 'type_of_services_default.png')
        {
            unlink('upload/images/type_services/'.$type_of_service->image);
        }

        $type_of_service->delete();

        $notification = notification('success', 'Xoá thành công !');

        return redirect()->route('type-services.index')->with($notification);
    }

}
