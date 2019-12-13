<?php

namespace App\Http\Controllers\TypeServices;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTypeServiceRequest;
use App\TypeOfService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TypeServicesController extends Controller
{
    /*
     * Show page index
     *
     */
    public function index()
    {
        $type_services = $this->type_services->all('desc');
        return view('admin.type_services.index', compact('type_services'));
    }

    /*
     * Show page create
     *
     */
    public function create()
    {
        return view('admin.type_services.create');
    }

    /*
     * Store new type services
     *
     */
    public function store(AddTypeServiceRequest $request)
    {
        $type_of_service = new TypeOfService();
        $path = config('contants.upload_type_services_path');

        $image = $request->avatar_hidden;
        $image = handleImageBase64($image);
        $imageName = getNameImageUnique(12);
        File::put($path.$imageName, $image);

        $type_of_service->image = $imageName;
        $type_of_service->slug = Str::slug($request->name);
        $type_of_service->fill($request->all())->save();

        return redirect()->route('type-services.index')->with('toast_success', 'Thêm thành công !');
    }

    /*
     * Show type service for edit
     *
     */
    public function show($id)
    {
        $type_of_service = $this->type_services->find($id);
        return view('admin.type_services.show', compact('type_of_service'));
    }

    /*
     * Update type service
     *
     */
    public function update(AddTypeServiceRequest $request, $id)
    {
        $type_of_service = $this->type_services->find($id);
        $path = config('contants.upload_type_services_path');
        $img_default = config('contants.img_type_of_services_default');

        if ($request->avatar_hidden != null){
            $image = handleImageBase64($request->avatar_hidden);
            $imageName = getNameImageUnique(12);
            checkExistsAndDeleteImage($path, $type_of_service->image, $img_default);
            File::put($path.$imageName, $image);
            $type_of_service->image = $imageName;
        }

        $type_of_service->fill($request->all())->save();
        return redirect()->route('type-services.index')->with('toast_success', 'Cập nhật thành công !');
    }

    /*
     * Destroy type service
     *
     */
    public function destroy($id)
    {
        $type_of_service = $this->type_services->find($id);
        $path = config('contants.upload_type_services_path');
        $img_default = config('contants.img_type_of_services_default');

        checkExistsAndDeleteImage($path, $type_of_service->image, $img_default);

        $type_of_service->delete();
        return redirect()->route('type-services.index')->with('toast_success', 'Xoá thành công !');
    }

}
