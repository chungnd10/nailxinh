<?php

namespace App\Http\Controllers\AccumulatePoints;

use App\AccumulatePoints;
use App\Services\AccumulatePointServices;
use App\Http\Controllers\Controller;

class AccumulatePointsController extends Controller
{
    protected $accumulate_points_services;

    public function __construct( AccumulatePointServices $accumulate_points_services)
    {
        $this->accumulate_points_services = $accumulate_points_services;
    }

    public function index()
    {
        $points = $this->accumulate_points_services->all();
        return view('admin.accumulate_points.index', compact('points'));
    }

    public function destroy($id)
    {
        $point = $this->accumulate_points_services->find($id);
        $point->delete();

        $notify = array(
            'message' => 'Xoá thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('accumulate-points.index')->with($notify);
    }
}
