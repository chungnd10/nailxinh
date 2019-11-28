<?php

namespace App\Http\Controllers\PhotoLibrary;

use App\PhotoLibrary;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $images = PhotoLibrary::all();
        return view('admin.photo_library.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $type_of_services = $this->type_services->all();
        return view('admin.photo_library.create', compact('type_of_services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $photo = new PhotoLibrary();

        $image = $request->avatar_hidden;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = uniqid(12).'.'.'png';

        $photo->image = $imageName;
        $photo->display_status_id = config('contants.display_status_hide');
        $photo->fill($request->all());
        $photo->save();
        File::put('upload/images/photo_library/'.$imageName, base64_decode($image));

        return redirect()->route('photo-library.index')->with('toast_success', 'Thêm thành công !');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $photo = PhotoLibrary::findOrFail($id);

        if (file_exists('upload/images/photo_library/'.$photo->image)
            && $photo->image != 'img-default.png')
        {
            unlink('upload/images/photo_library/'.$photo->image);
        }

        $photo->delete();

        return redirect()->route('photo-library.index')->with('toast_success', 'Xoá thành công !');
    }
}
