<?php

namespace App\Http\Controllers\Introduction;

use App\Http\Requests\IntroductionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class IntroductionController extends Controller
{
    /*
     * Show page index
     *
     */
    public function index()
    {
        $item = $this->introduction_services->first();
        return view('admin.introductions.index', compact('item'));
    }

    /*
     * Update information
     *
     */
    public function update(IntroductionRequest $request)
    {
        $item = $this->introduction_services->first();

        $path = config('contants.upload_introduction_path');
        $img_default = config('contants.img_default_4_3');

        if ($request->avatar_hidden != null){
            $image = $request->avatar_hidden;
            $image = handleImageBase64($image);
            $imageName = getNameImageUnique(12);
            checkExistsAndDeleteImage($path, $item->image, $img_default);
            File::put($path.$imageName, $image);
            $item->image = $imageName;
        }

        $item->fill($request->all())->save();
        return redirect()->route('admin.index')->with('toast_success', 'Cập nhật thành công !');
    }
}
