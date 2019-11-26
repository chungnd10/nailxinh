<?php

namespace App\Http\Controllers\Order;

use App\AccumulatePoints;
use App\Bill;
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

        $status_completed = config('contants.order_status_finish');


        if (Auth::check()) {

            $all_order_with_branch = $this->order_services->allWithBranch(Auth::user()->branch_id);

            switch (Auth::user()->role_id) {
                case $admin :
                    $orders = $this->order_services->all();
                    break;
                case $manager :
                    $orders = $all_order_with_branch;
                    break;
                case $cashier :
                    $orders = $this->order_services->allWhereStatus(Auth::user()->branch_id, $status_completed);
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

        if (Auth::check())
        {
            $order->user_id = Auth::user()->id;
            $order->branch_id = Auth::user()->branch_id;
            $order->created_by = Auth::user()->full_name;
        }

        $order->service_id = implode(',',$request->service_id);
        $order->order_status_id = config('contants.order_status_unconfimred');

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

    public function update(Request $request, $order_id)
    {
        $order_id =head( Hashids::decode($order_id));
        $status_completed = config('contants.order_status_finish');

        if ( $request->order_status_id == $status_completed )
        {
            $bill_flag = $this->bill_services->getOneWithOrderId($order_id);
            // kiểm tra xem lịch đặt đã có hóa đơn chưa
            if ($bill_flag->first() ? $bill = $bill_flag->first() : $bill = new Bill())
            // lấy giá của tất cả dịch vụ đã sử dụng
            $bill->total_price = $this->service_services->getPriceWithServices($request->service_id);
            // lấy tiền tích điểm của khách
            $accumulate = $this->accumulate_points_services->getPointsOfServices($request->phone_number);

            // nếu có rồi thì lấy ra tích điểm của khách
            if ($accumulate != null) {
                $accumulate_of_guest = $accumulate;
            }else{
                // nếu chưa có thì tạo mới
                $accumulate_points = new AccumulatePoints();
                $accumulate_points->phone_number = $request->phone_number;
                $accumulate_points->total_money = $bill->total_price;
                $accumulate_points->save();

                $accumulate_of_guest = 0;
            }

            //lấy danh sách loại thành viên
            $membership_type = $this->membership_type->all();

            // kiểm tra xem khách hàng thuộc lại thành viên nào và lấy % giảm giá
            foreach ($membership_type as $membershipType){
                if ($accumulate_of_guest <= $membershipType->money_level){
                    $bill->discount = $membershipType->discount_level;
                }
            }

            $bill->note = '';
            $bill->order_id = $order_id;
            $bill->bill_status_id = config('contants.bill_status_unpaid');
            $bill->total_payment = $bill->total_price * ( 100 - $bill->discount )/100;
            $bill->save();
        }

        $order = $this->order_services->find($order_id);
        $order->service_id = implode(',',$request->service_id);
        if (Auth::check() ? $order->updated_by = Auth::user()->full_name : '')

        $order->fill($request->all());
        $order->save();

        $notification = notification('success', 'Cập nhật thành công');

        return redirect()->route('orders.index')->with($notification);

    }
}
