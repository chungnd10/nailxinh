<?php

namespace App\Http\Controllers\Branch;

use App\Http\Requests\AddBranchRequest;
use App\Http\Controllers\Controller;
use App\Branch;

class BranchController extends Controller
{

    /*
     * Show branch
     *
     * @return array
     */
    public function index()
    {
    	$branchs = $this->branch_services->all();

    	return view('admin.branchs.index', compact('branchs'));
    }

    /*
     * Show page add branch
     *
     * @return object
     */
    public function create()
    {
    	$cities = $this->city_services->all();

    	return view('admin.branchs.create', compact('cities'));

    }

    /*
     * Store  branch
     *
     */
    public function store(AddBranchRequest $request)
    {
    	$branch = new Branch();

        $branch->fill($request->all())->save();

        return redirect()->route('branch.index')->with('toast_success', 'Thêm thành công !');
    }

    /*
     * Show branch for editing
     *
     * @param int $id
     * @return object
     */
    public function show($id)
    {
        $branch = $this->branch_services->find($id);

        $cities = $this->city_services->all();

        return view('admin.branchs.show', compact('branch','cities'));
    }

    /*
     * Update branch
     *
     * @param request $request
     * @param int $id
     */
    public function update(AddBranchRequest $request, $id)
    {
        $branch = $this->branch_services->find($id);

        $branch->fill($request->all())->save();

        return redirect()->route('branch.index')->with('toast_success', 'Cập nhật thành công !');
    }

    /*
     * Delete branch
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $branch = $this->branch_services->find($id);

        $branch->delete();

        return redirect()->route('branch.index')->with('toast_success', 'Xoá thành công !');
    }
}
