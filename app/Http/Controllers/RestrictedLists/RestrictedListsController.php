<?php

namespace App\Http\Controllers\RestrictedLists;

use App\Http\Controllers\Controller;
use App\RestrictedList;

class RestrictedListsController extends Controller
{

    public function index()
    {
        $lists = $this->restricted_lists->all();

        return view('admin.restricted_lists.index', compact('lists'));
    }

    public function add($phone_number)
    {
        $black_list = RestrictedList::where('phone_number', $phone_number)->first();
        if ($black_list == null){
            $black_list = new  RestrictedList();
            $black_list->phone_number = $phone_number;
            $black_list->save();

            return redirect()->route('orders.index')
            ->with('toast_success', 'Thêm vào danh sách hạn chế thành công !');
        }
        return redirect()->route('orders.index')
            ->with('toast_error', 'Đã được thêm trước đây !');
    }

    public function destroy($id)
    {
        $list = $this->restricted_lists->find($id);

        $list->delete();

        return redirect()->route('restricted-lists.index')
            ->with('toast_success', 'Xoá thành công !');
    }
}
