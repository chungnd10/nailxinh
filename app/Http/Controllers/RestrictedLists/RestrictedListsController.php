<?php

namespace App\Http\Controllers\RestrictedLists;

use App\Http\Controllers\Controller;

class RestrictedListsController extends Controller
{

    public function index()
    {
        $lists = $this->restricted_lists->all();

        return view('admin.restricted_lists.index', compact('lists'));
    }

    public function destroy($id)
    {
        $list = $this->restricted_lists->find($id);

        $list->delete();

        $notification = notification('success', 'Xoá thành công !');

        return redirect()->route('restricted-lists.index')->with($notification);
    }
}
