<?php

namespace App\Http\Controllers\ProcessTypeServices;

use App\Http\Requests\AddProcessRequest;
use App\Services\ProcessOfServiceServices;
use App\Services\ServiceServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProcessOfService;

class ProcessTypeServicesController extends Controller
{
    protected $process_of_services;
    protected $services;

    public function __construct(ProcessOfServiceServices $process_of_services, ServiceServices $services)
    {
        $this->process_of_services = $process_of_services;
        $this->services = $services;
    }

    public function index()
    {
        $processTypeServices = $this->process_of_services->all();

        return view('admin.process_type_services.index', compact('processTypeServices'));
    }

    public function create()
    {
        $services = $this->services->all();

        return view('admin.process_type_services.create', compact('services'));
    }

    public function store(AddProcessRequest $request)
    {
        $process = new ProcessOfService();

        $process->fill($request->all())->save();

        $notification = notification('success', 'Thêm thành công !');

        return redirect()->route('process-type-services.index')->with($notification);
    }

    public function show($id)
    {
        $process = $this->process_of_services->find($id);

        $services = $this->services->all();

        return view('admin.process_type_services.show', compact('process', 'services'));
    }

    public function update(AddProcessRequest $request, $id)
    {
        $process = $this->process_of_services->find($id);

        $process->fill($request->all())->save();

        $notify = notification('success', 'Cập nhật thành công !');

        return redirect()->route('process-type-services.index')->with($notify);
    }

    public function destroy($id)
    {
        $process = $this->process_of_services->find($id);

        $process->delete();

        $notify = notification('success', 'Xoá thành công !');

        return redirect()->route('process-type-services.index')->with($notify);
    }

    //get process with type services
    public function getProcessWithTypeServices(Request $request)
    {
        if ($request->ajax()) {
            $process = $this->process_of_services->getProcessWithType($request->service_id);
            return response()->json($process);
        }

    }
}
