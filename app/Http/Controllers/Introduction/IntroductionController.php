<?php

namespace App\Http\Controllers\Introduction;

use App\Http\Requests\IntroductionRequest;
use App\Http\Controllers\Controller;

class IntroductionController extends Controller
{
    public function index()
    {
        $item = $this->introduction_services->first();
        return view('admin.introductions.index', compact('item'));
    }

    public function update(IntroductionRequest $request)
    {
        $item = $this->introduction_services->first();

        if ($request->hasFile('image'))
        {
            if (file_exists('upload/images/introductions/'.$item->image)
                && $item->image != 'img-default.png')
            {
                unlink('upload/images/introductions/'.$item->image);
            }

            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/introductions', $name);
            $item->image = $name;
        }

        $item->fill($request->all())->save();

        $notification = notification('success', 'Cập nhật thành công !');

        return redirect()->route('admin.index')->with($notification);
    }
}
