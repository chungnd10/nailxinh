<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Service;
use App\Http\Requests\AddServiceRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    /*
     * Show page index
     *
     */
    public function index()
    {
        $services = $this->service_services->all();
        return view('admin.services.index', compact('services'));
    }

    /*
     * Show page create
     *
     */
    public function create()
    {
        $type_of_services = $this->type_services->all( 'desc');
        return view('admin.services.create', compact('type_of_services'));
    }

    /*
     * Store new services
     *
     */
    public function store(AddServiceRequest $request)
    {
        $service = new Service();
        $path = config('contants.upload_services_path');

        if ($request->avatar_hidden != null){
            $image = $request->avatar_hidden;
            $image = handleImageBase64($image);
            $imageName = getNameImageUnique(12);
            File::put($path.$imageName, $image);
            $service->image = $imageName;
        }

        $service->slug = Str::slug($request->name);
        $service->fill($request->all())->save();

        return redirect()->route('services.index')->with('toast_success', 'Thêm thành công !');
    }

    /*
     * Show page edit service for edit
     *
     */
    public function show($id)
    {
        $service = $this->service_services->find($id);
        $type_of_services = $this->type_services->all('desc');
        return view('admin.services.show', compact('service', 'type_of_services'));
    }

    /*
     * Update service
     *
     */
    public function update(AddServiceRequest $request, $id)
    {
        $service = $this->service_services->find($id);
        $path = config('contants.upload_services_path');
        $img_default = config('contants.img_services-default');

        if ($request->avatar_hidden != null){
            $image = $request->avatar_hidden;
            $image = handleImageBase64($image);
            $imageName = getNameImageUnique(12);
            checkExistsAndDeleteImage($path, $service->image, $img_default);
            File::put($path.$imageName, $image);
            $service->image = $imageName;
        }

        $service->slug = Str::slug($request->name);
        $service->fill($request->all())->save();

        return redirect()->route('services.index') ->with('toast_success', 'Cập nhật thành công !');
    }

    /*
     * Destroy service
     *
     */
    public function destroy($id)
    {
        $service = $this->service_services->find($id);
        $path = config('contants.upload_services_path');
        $img_default = config('contants.img_services-default');

        checkExistsAndDeleteImage($path, $service->image, $img_default);
        $service->delete();

        return redirect()->route('services.index') ->with('toast_success', 'Xoá thành công !');
    }
}
