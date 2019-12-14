<?php

namespace App\Http\Controllers\PhotoLibrary;

use App\Http\Requests\PhotoLibraryRequest;
use App\PhotoLibrary;
use App\Services\PhotoLibraryServices;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoLibraryController extends Controller
{
    /**
     * Hiển thị danh sách thư viện ảnh
     *
     */
    public function index()
    {
        $images = $this->photo_library_services->take('desc', 12);
        return view('admin.photo_library.index', compact('images'));
    }

    /**
     * Hiển thị giao diện thêm ảnh
     *
     */
    public function create()
    {
        $display_status = $this->display_status_services->all();
        return view('admin.photo_library.create', compact('display_status'));
    }

    /**
     * Lưu ảnh
     *
     */
    public function store(PhotoLibraryRequest $request)
    {
        $photo = new PhotoLibrary();
        $path = config('contants.upload_photo_library_path');

        $image = $request->avatar_hidden;
        $image = handleImageBase64($image);
        $imageName = getNameImageUnique(12);

        $photo->image = $imageName;
        $photo->fill($request->all());
        $photo->save();

        File::put($path . $imageName, $image);

        return redirect()->route('photo-library.index')->with('toast_success', 'Thêm thành công !');
    }

    /*
     * Hiển thị để sửa
     *
     */
    public function show($id)
    {
        $photo = PhotoLibrary::findOrFail($id);
        $display_status = $this->display_status_services->all();

        return view('admin.photo_library.show', compact('display_status', 'photo'));
    }

    /*
     * Cập nhật
     *
     */
    public function update(PhotoLibraryRequest $request, $id)
    {
        $photo = PhotoLibrary::findOrFail($id);
        $path = config('contants.upload_photo_library_path');
        $img_default = config('contants.img_default_4_3');

        if ($request->avatar_hidden) {
            $image = handleImageBase64($request->avatar_hidden);
            $imageName = getNameImageUnique(12);

            checkExistsAndDeleteImage($path, $photo->image, $img_default);

            File::put($path . $imageName, $image);

            $photo->image = $imageName;
        }

        $photo->fill($request->all());
        $photo->save();

        return redirect()->route('photo-library.index')->with('toast_success', 'Cập nhật thành công !');
    }


    /**
     * Xóa 1 ảnh
     *
     */
    public function destroy($id)
    {
        $photo = PhotoLibrary::findOrFail($id);
        $path = config('contants.upload_photo_library_path');
        $img_default = config('contants.img_default_4_3');

        checkExistsAndDeleteImage($path, $photo->image, $img_default);

        $photo->delete();

        return redirect()->route('photo-library.index')->with('toast_success', 'Xoá thành công !');
    }

    /*
     * Thay đổi trạng thái hiển thị
     *
     */
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $photo = PhotoLibrary::findOrFail($id);
            $photo->display_status_id = $request->display_status_id;
            $photo->save();

            return response()->json(['success' => 'Status change successfully.']);
        }
        return response()->json(['fail' => 'Status change fail.']);
    }

    /*
     * Xóa nhiều ảnh
     *
     */

    public function deleteMany(Request $request)
    {
        $id = $request->input('deleteMany');
        $path = config('contants.upload_photo_library_path');
        $img_default = config('contants.img_default_4_3');

        foreach ($id as $key => $item) {
            $id_decode[] = head(\Hashids::decode($item));
        }

        $photos = PhotoLibrary::findOrFail($id_decode);

        $this->photo_library_services->deleteMany($id_decode);

        foreach ($photos as $photo) {
            checkExistsAndDeleteImage($path, $photo->image, $img_default );
        }

        return redirect()->route('photo-library.index')->with('toast_success', 'Xoá thành công !');
    }

    /*
     * Tim kiem
     *
     */
    public function photoSearch(Request $request)
    {
        $type_id = $request->type_services;
        $images = $this->photo_library_services->photoSearch($type_id, 12);
        $request->flash();
        return view('admin.photo_library.index', compact('images'));
    }

}
