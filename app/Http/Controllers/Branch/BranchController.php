<?php

namespace App\Http\Controllers\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Branch;
class BranchController extends Controller
{
    public function index(){
    	$branchs = Branch::paginate(10);
    	return view('admin.branchs.index', compact('branchs'));
    }
    public function create(){
    	$cities = City::all();
    	return view('admin.branchs.create', compact('cities'));

    }
    public function store(Request $request){
    	$branch = new Branch();
    	//lưu
        $branch->fill($request->all())->save();
//dd($request->all());
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
        $branch = Branch::find($id);
        $cities = City::all();
        // điều hướng
        return view('admin.branchs.show', compact('branch','cities'));
    }

    public function update(Request $request, $id)
    {
        // khai báo đối tượng
       $branch = Branch::find($id);

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
        $branch = Branch::find($id);

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
