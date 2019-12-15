<?php

namespace App\Http\Controllers\MembershipType;

use App\Http\Requests\MembershipTypeRequest;
use App\MembershipType;
use App\Http\Controllers\Controller;

class MembershipTypeController extends Controller
{
    public function index()
    {
        $membership_type = $this->membership_type->all('desc');

        return view('admin.membership_type.index', compact('membership_type'));
    }

    public function create()
    {
        return view('admin.membership_type.create');
    }

    public function store(MembershipTypeRequest $request)
    {
        $membership_type = new MembershipType();

        $membership_type->fill($request->all())->save();

        return redirect()->route('membership_type.index')
            ->with('toast_success', 'Thêm thành công !');
    }

    public function show($id)
    {
        $membership_type = MembershipType::find($id);

        return view('admin.membership_type.show', compact('membership_type'));
    }

    public function update(MembershipTypeRequest $request, $id)
    {
        $membership_type = MembershipType::find($id);

        $membership_type->fill($request->all())->save();

        return redirect()->route('membership_type.index')
            ->with('toast_success', 'Cập nhật thành công !');
    }

    public function destroy($id)
    {
        $membership_type = MembershipType::findOrFail($id);

        $membership_type->delete();

        return redirect()->route('membership_type.index')
            ->with('toast_success', 'Xoá thành công !');
    }
}
