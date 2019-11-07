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
    	//lưu
        $branch->fill($request->all())->save();
        // xuất thông báo
        $notification = array(
            'message' => 'Thêm chi nhánh thành công !',
            'alert-type' => 'success'
        );
        //điều hướng
        return redirect()->route('branch.index')->with($notification);
    }

    public function show($id)
    {
        // tìm kiếm đối tượng
        $branch = $this->branch_services->find($id);
        $cities = $this->city_services->all();
        // điều hướng
        return view('admin.branchs.show', compact('branch','cities'));
    }

    public function update(AddBranchRequest $request, $id)
    {
        // khai báo đối tượng
        $branch = $this->branch_services->find($id);
        //lưu
        $branch->fill($request->all())->save();
        // xuất thông báo
        $notify = array(
            'message' => 'Cập nhật chi nhánh thành công !',
            'alert-type' => 'success'
        );
        //điều hướng
        return redirect()->route('branch.index')->with($notify);
    }

    public function destroy($id)
    {
        //tìm kiếm đối tượng
        $branch = $this->branch_services->find($id);
        // thực thi xóa
        $branch->delete();
        //xuất thông báo
        $notify = array(
            'alert-type' => 'success',
            'message' => 'Xoá chi nhánh thành công !'
        );
        // điều hướng
        return redirect()->route('branch.index')->with($notify);
    }
}
