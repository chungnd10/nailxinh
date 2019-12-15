<?php

namespace App\Http\Controllers\Order;

use App\Bill;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /*
     * Show page index
     *
     */
    public function index()
    {
        $admin = config('contants.role_admin');
        $manager = config('contants.role_manager');
        $cashier = config('contants.role_cashier');
        $receptionist = config('contants.role_receptionist');

        if (Auth::check()) {
            $role_id = Auth::user()->role_id;
            $branch_id = Auth::user()->branch_id;

            $orders = $this->order_services->all(10);
            $order_status = $this->order_status_services->all('asc');


            if ($role_id = $admin) {
                $branches = $this->branch_services->all('asc');
                $technicians = $this->user_services->getTechnician('asc');
            } elseif ($role_id = $manager || $role_id == $cashier || $role_id == $receptionist) {
                $technicians = $this->user_services->getTechnicianWithBranch($branch_id, 'asc');
            } else {
                $branches = null;
                $technicians = null;
            }
        }

        return view('admin.orders.index', compact(
                'orders',
                'branches',
                'technicians',
                'order_status'
            )
        );
    }

    /*
     * Show page create
     *
     */
    public function create()
    {
        $type_services = $this->type_services->all('asc');
        return view('admin.orders.create', compact('type_services'));
    }

    /*
     * Store new order
     *
     */
    public function store(Request $request)
    {
        $order = new Order();
        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
            $order->branch_id = Auth::user()->branch_id;
            $order->created_by = Auth::user()->full_name;
        }

        $order->order_status_id = config('contants.order_status_unconfirmed');
        $order->fill($request->all());
        $order->save();

        $service_id = $request->input('service_id');
        $order->services()->sync($service_id);

        return redirect()->route('orders.index')->with('toast_success', 'Thêm thành công !');
    }

    /*
     * Show for editing
     *
     */
    public function show($id)
    {
        $order = $this->order_services->find($id);
        $bill = Bill::where('order_id', $order->id)->first();
        $bill_status_id = $bill->bill_status_id;

        $this->authorize('update', [ $order, $bill_status_id ]);


        $admin = config('contants.role_admin');
        $manager = config('contants.role_manager');
        $technician = config('contants.role_technician');
        $receptionist = config('contants.role_receptionist');

        $type_services = $this->type_services->all('asc');
        $branches = $this->branch_services->all('asc');
        $users = $this->user_services->getTechnicianWithBranch($order->branch_id, 'asc');

        if (Auth::check()) {
            $user_role = Auth::user()->role_id;

            switch ($user_role) {
                case $admin:
                    $orders_status = $this->order_status_services->all('asc');
                    break;
                case $manager:
                    $orders_status = $this->order_status_services->all('asc');
                    break;
                case $technician:
                    $orders_status = $this->order_status_services->forTechnician();
                    break;
                case $receptionist:
                    $orders_status = $this->order_status_services->forReceptionist();
                    break;

            }
        }

        return view('admin.orders.show', compact(
                'order',
                'type_services',
                'orders_status',
                'branches',
                'users'
            )
        );
    }

    /*
     * Update order
     *
     */
    public function update(UpdateOrderRequest $request, $order_id)
    {
        $status_completed = config('contants.order_status_finish');

        if ($request->order_status_id == $status_completed) {

            // kiểm tra xem lịch đặt đã có hóa đơn chưa
            $bill_flag = $this->bill_services->getOneWithOrderId($order_id);

            if ($bill_flag->first() ? $bill = $bill_flag->first() : $bill = new Bill()) {
                // lấy giá của tất cả dịch vụ đã sử dụng
                $bill->total_price = $this->service_services->getPriceWithServices($request->service_id);
            }
            // lấy tiền tích điểm của khách
            $accumulate = $this->accumulate_points_services->getPointsOfGuest($request->phone_number);
            //lấy danh sách loại thành viên
            $membership_type = $this->membership_type->all('asc');

            // nếu có rồi thì lấy ra tích điểm của khách
            if ($accumulate != null) {
                $accumulate_of_guest = $accumulate;
                // kiểm tra xem khách hàng thuộc lại thành viên nào và lấy % giảm giá
                $t = -1;
                foreach ($membership_type as $item) {
                    if ($item->money_level < $accumulate_of_guest && $item->money_level > $t) {
                        $bill->discount = $item->discount_level;
                    }
                }
            } else {
                $bill->discount = 0;
            }


            $bill->order_id = $order_id;
            $bill->bill_status_id = config('contants.bill_status_unpaid');
            $bill->total_payment = $bill->total_price * (100 - $bill->discount) / 100;
            $bill->save();
        }

        $order = $this->order_services->find($order_id);

        if (Auth::check() ? $order->updated_by = Auth::user()->id : '') {
            $order->fill($request->all());
        }

        $order->save();
        $service_id = $request->input('service_id');
        $order->services()->sync($service_id);

        return redirect()->route('orders.index')->with('toast_success', 'Cập nhật thành công !');

    }

    /*
     * Export bill
     *
     */
    public function exportBill($order_id)
    {
        $bill_flag = $this->bill_services->getOneWithOrderId($order_id);
        $order = $this->order_services->find($order_id);

        // kiểm tra xem lịch đặt đã có hóa đơn chưa
        if ($bill_flag->first() ? $bill = $bill_flag->first() : $bill = new Bill()) {
            // lấy giá của tất cả dịch vụ đã sử dụng
            $bill->total_price = $this->service_services->getPriceWithServices($order->service_id);
        }
        // lấy tiền tích điểm của khách
        $accumulate = $this->accumulate_points_services->getPointsOfGuest($order->phone_number);
        //lấy danh sách loại thành viên
        $membership_type = $this->membership_type->orderBy('asc');

        // nếu có rồi thì lấy ra tích điểm của khách
        if ($accumulate != null) {
            $accumulate_of_guest = $accumulate;
        } else {
            $accumulate_of_guest = 0;
        }

        // kiểm tra xem khách hàng thuộc lại thành viên nào và lấy % giảm giá
        foreach ($membership_type as $membershipType) {
            if ($accumulate_of_guest <= $membershipType->money_level) {
                $bill->discount = $membershipType->discount_level;
            }
        }

        $bill->order_id = $order_id;
        $bill->bill_status_id = config('contants.bill_status_unpaid');
        $bill->total_payment = $bill->total_price * (100 - $bill->discount) / 100;
        $bill->save();

        return redirect()->route('orders.index')->with('toast_success', 'Xuất hóa đơn thành công !');
    }

    /*
     * Tim kiem nang cao
     *
     */
    public function advancedSearch(Request $request)
    {
        $current_role_id = Auth::user()->role_id;
        $branch_id = $request->branch_id;

        $role_admin = config('contants.role_admin');
        $manager = config('contants.role_manager');
        $role_technician = config('contants.role_technician');
        $cashier = config('contants.role_cashier');
        $receptionist = config('contants.role_receptionist');

        $order_status = $this->order_status_services->all('asc');

        if ($current_role_id = $role_admin) {
            $branches = $this->branch_services->all('asc');
            $technicians = $this->user_services->getTechnician('asc');
            $order_status_id = $request->order_status_id;
        } elseif ($current_role_id = $manager || $current_role_id == $cashier || $current_role_id == $receptionist) {
             $technicians = $this->user_services->getTechnicianWithBranch($branch_id, 'asc');
            $branch_id = Auth::user()->branch_id;
        } else {
            $branches = null;
            $technicians = null;
            $branch_id = null;
            $order_status_id = $request->order_status_id;

        }

        $user_order = $request->user_order;
        $user_id = $request->user_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $searched = true;
        $request->flash();

        $orders = $this->order_services->advancedSearch(
            $user_order,
            $order_status_id,
            $branch_id,
            $user_id,
            $start_date,
            $end_date,
            10
        );
        return view('admin.orders.index', compact(
                'orders',
                'branches',
                'searched',
                'order_status',
                'technicians'
            )
        );
    }
}
