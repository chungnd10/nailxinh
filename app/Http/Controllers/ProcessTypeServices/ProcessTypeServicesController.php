<?php

namespace App\Http\Controllers\ProcessTypeServices;

use App\Http\Requests\AddProcessRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProcessOfService;

class ProcessTypeServicesController extends Controller
{
    public function index()
    {
        $processTypeServices = $this->process_of_services->all();

        return view('admin.process_type_services.index', compact('processTypeServices'));
    }

    public function create()
    {
        $services = $this->service_services->all();

        return view('admin.process_type_services.create', compact('services'));
    }

    public function store(AddProcessRequest $request)
    {
        $process = new ProcessOfService();

        $process->fill($request->all())->save();

        return redirect()->route('process-type-services.index')
            ->with('toast_success', 'Thêm thành công !');
    }

    public function show($id)
    {
        $process = $this->process_of_services->find($id);

        $services = $this->service_services->all();

        return view('admin.process_type_services.show', compact('process', 'services'));
    }

    public function update(AddProcessRequest $request, $id)
    {
        $process = $this->process_of_services->find($id);

        $process->fill($request->all())->save();

        return redirect()->route('process-type-services.index')
            ->with('toast_success', 'Cập nhật thành công !');
    }

    public function destroy($id)
    {
        $process = $this->process_of_services->find($id);

        $process->delete();

        return redirect()->route('process-type-services.index')
            ->with('toast_success', 'Xoá thành công !');
    }

    /*
     *  Get process with type services
     *
     * @return void
     */
    public function getProcessWithTypeServices(Request $request)
    {
        if ($request->ajax()) {
            $process = $this->process_of_services->getProcessWithType($request->service_id);
            return response()->json($process);
        }
    }
}
