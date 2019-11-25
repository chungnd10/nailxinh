<?php

namespace App\Http\Controllers\AccumulatePoints;

use App\Http\Controllers\Controller;

class AccumulatePointsController extends Controller
{
    public function index()
    {
        $points = $this->accumulate_points_services->all();

        return view('admin.accumulate_points.index', compact('points'));
    }

    public function destroy($id)
    {
        $point = $this->accumulate_points_services->find($id);

        $point->delete();

        $notification = notification('success', 'Xoá thành công !');

        return redirect()->route('accumulate-points.index')->with($notification);
    }
}
