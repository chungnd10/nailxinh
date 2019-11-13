<?php

namespace App\Http\Controllers\Branch;

use App\Http\Requests\AddBranchRequest;
use App\Services\BranchServices;
use App\Services\CityServices;
use App\Services\UserServices;
use App\Http\Controllers\Controller;
use App\City;
use App\Branch;

class BranchController extends Controller
{

    protected $user_sercices;
    protected $branch_services;
    protected $city_services;

    public function __construct(
        UserServices $user_sercices,
        BranchServices $branch_services,
        CityServices $city_services
    )
    {
        $this->user_sercices = $user_sercices;
        $this->branch_services = $branch_services;
        $this->city_services = $city_services;
    }

    public function index()
    {
    	$branchs = $this->branch_services->all();

    	return view('admin.branchs.index', compact('branchs'));
    }

    public function create()
    {
    	$cities = $this->city_services->all();

    	return view('admin.branchs.create', compact('cities'));

    }

    public function store(AddBranchRequest $request)
    {
    	$branch = new Branch();

        $branch->fill($request->all())->save();

        $notification = notification('success', 'Thêm thành công !');

        return redirect()->route('branch.index')->with($notification);
    }

    public function show($id)
    {
        $branch = $this->branch_services->find($id);

        $cities = $this->city_services->all();

        return view('admin.branchs.show', compact('branch','cities'));
    }

    public function update(AddBranchRequest $request, $id)
    {
        $branch = $this->branch_services->find($id);

        $branch->fill($request->all())->save();

        $notification = notification('success', 'Cập nhật thành công !');

        return redirect()->route('branch.index')->with($notification);
    }

    public function destroy($id)
    {

        $branch = $this->branch_services->find($id);

        $branch->delete();

        $notification = notification('success', 'Xoá thành công !');

        return redirect()->route('branch.index')->with($notification);
    }
}
