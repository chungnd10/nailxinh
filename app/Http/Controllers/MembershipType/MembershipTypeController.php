<?php

namespace App\Http\Controllers\MembershipType;

use App\Http\Requests\MembershipTypeRequest;
use App\MembershipType;
use App\Services\MembershipTypeServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipTypeController extends Controller
{
    protected $membership_type;

    public function __construct(MembershipTypeServices $membership_type)
    {
        $this->membership_type = $membership_type;
    }

    public function index()
    {
        $membership_type = $this->membership_type->all();

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

        $notification = notification('success', 'Thêm thành công !');

        return redirect()->route('membership_type.index')->with($notification);
    }

    public function show($id){
        $membership_type = MembershipType::find($id);

        return view('admin.membership_type.show', compact('membership_type'));
    }

    public function update(MembershipTypeRequest $request, $id)
    {
        $membership_type = MembershipType::find($id);

        $membership_type->fill($request->all())->save();

        $notification = notification('success', 'Cập nhật thành công !');

        return redirect()->route('membership_type.index')->with($notification);
    }

    public function destroy($id)
    {
        $membership_type = MembershipType::find($id);

        $membership_type->delete();

        $notification = notification('success', 'Xoá thành công !');

        return redirect()->route('membership_type.index')->with($notification);
    }
}
