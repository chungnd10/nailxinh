<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class OrderController extends Controller
{
    public function index()
    {
        $admin = config('contants.role_admin');
        $manager = config('contants.role_manager');
        $technician = config('contants.role_technician');
        $cashier = config('contants.role_cashier');
        $receptionist = config('contants.role_receptionist');

        $all_order_with_branch = $this->order_services->allWithBranch(Auth::user()->branch_id);
        if (Auth::check()) {
            switch (Auth::user()->role_id) {
                case $admin :
                    $orders = $this->order_services->all();
                    break;
                case $manager :
                    $orders = $all_order_with_branch;
                    break;
                case $cashier :
                    $orders = $all_order_with_branch;
                    break;
                case $receptionist :
                    $orders = $all_order_with_branch;
                    break;
                case $technician :
                    $orders = $this->order_services->allOfTechnician(Auth::user()->branch_id, Auth::user()->id);
                    break;
            }
        }

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $type_services = $this->type_services->all();

        return view('admin.orders.create', compact('type_services'));
    }

    public function store(Request $request)
    {
        $order = new Order();

        $order->branch_id = Auth::user()->branch_id;
        $order->user_id = Auth::user()->id;
        $order->service_id = implode(',',$request->service_id);
        $order->order_status_id = config('contants.order_status_unconfimred');

        $order->created_by = Auth::user()->full_name;

        $order->fill($request->all());
        $order->save();

        $notification = notification('success', 'Thêm thành công');

        return redirect()->route('orders.index')->with($notification);

    }

    public function show($id)
    {
        $order_id =head( Hashids::decode($id));

        if($order_id === false){
            return view('admin.errors.404');
        }

        $order = $this->order_services->find($order_id);

        $type_services = $this->type_services->all();
        $orders_status = $this->order_status_services->all();

        return view('admin.orders.show', compact('order', 'type_services', 'orders_status'));
    }

    public function update(Request $request, $id)
    {
        $order = $this->order_services->find($id);

        $order->service_id = implode(',',$request->service_id);
        $order->updated_by = Auth::user()->full_name;

        $order->fill($request->all());
        $order->save();

        $notification = notification('success', 'Cập nhật thành công');

        return redirect()->route('orders.index')->with($notification);

    }
}
