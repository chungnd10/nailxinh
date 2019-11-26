<?php

namespace App\Http\Controllers\Subscribe;

use App\Subscribe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscribes = Subscribe::all();
        return view('admin.subscribes.index', compact('subscribes'));
    }

    public function destroy($id)
    {
        $subscribe = Subscribe::findOrFail($id);

        $subscribe->delete();

        return redirect()->route('subscribe.index')->with('toast_success', 'Xoá thành công !');
    }

    public function deleteMany(Request $request)
    {
        $id = $request->input('deleteMany');

        Subscribe::whereIn('id',$id)->delete();

        return redirect()->route('subscribe.index')->with('toast_success', 'Xoá thành công !');
    }
}
