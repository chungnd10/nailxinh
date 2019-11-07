<?php

namespace App\Http\Controllers\ProcessTypeServices;

use App\Services\ProcessOfServiceServices;
use App\Services\TypeServiceServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProcessOfService;
use App\TypeOfService;

class ProcessTypeServicesController extends Controller
{
    protected $process_of_services;
    protected $type_services;

    public function __construct(ProcessOfServiceServices $process_of_services, TypeServiceServices $type_services)
    {
        $this->process_of_services = $process_of_services;
        $this->type_services = $type_services;
    }

    public function index()
    {
        $processTypeServices = $this->process_of_services->all();
        return view('admin.process_type_services.index', compact('processTypeServices'));
    }

    public function create()
    {
        $type_of_services = $this->type_services->all();
        return view('admin.process_type_services.create', compact('type_of_services'));
    }

    public function store(Request $request)
    {
        $process = new ProcessOfService();
        $process->fill($request->all())->save();
        // xuất thông báo
        $notification = array(
            'message' => 'Thêm quy trình thành công !',
            'alert-type' => 'success'
        );
        return redirect()->route('process-type-services.index')->with($notification);
    }

    public function show($id)
    {
        $process = $this->process_of_services->find($id);
        $type_of_services = $this->type_services->all();
        return view('admin.process_type_services.show', compact('process', 'type_of_services'));
    }

    public function update(Request $request, $id)
    {
        $process = $this->process_of_services->find($id);
        //lưu
        $process->fill($request->all())->save();
        // xuất thông báo
        $notify = array(
            'message' => 'Cập nhật quy trình thành công !',
            'alert-type' => 'success'
        );
        //điều hướng
        return redirect()->route('process-type-services.index')->with($notify);
    }

    public function destroy($id)
    {
        $process = $this->process_of_services->find($id);
        // thực thi xóa
        $process->delete();
        //xuất thông báo
        $notify = array(
            'alert-type' => 'success',
            'message' => 'Xoá quy trình thành công !'
        );
        // điều hướng
        return redirect()->route('process-type-services.index')->with($notify);
    }

    //get process with type services
    public function getProcessWithTypeServices(Request $request)
    {
        if ($request->ajax()) {
            $process = $this->process_of_services->getProcessWithType($request->type_of_services_id);
            return response()->json($process);
        }

    }
}
