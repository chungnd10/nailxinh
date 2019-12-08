<?php

namespace App\Http\Controllers\Bill;

use App\AccumulatePoints;
use App\Bill;
use App\BillStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
            ->join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'orders.note',
                'created_by',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at',
                DB::raw('group_concat(order_services.service_id) as service_id'))
            ->groupBy(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'orders.note',
                'created_by',
                'updated_by',
                'branch_id',
                'user_id',
                'order_status_id',
                'orders.created_at',
                'orders.updated_at'
                )
            ->orderby('orders.id', 'desc')
            ->get();


        return view('admin.bills.index', compact('bills'));
    }

    // xem chi tiết 1 hóa đơn
    public function show($order_id)
    {
        $bill = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
            ->join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'branch_id',
                DB::raw('group_concat(order_services.service_id) as service_id'))
            ->groupBy(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'branch_id'
                )
            ->orderby('orders.id', 'desc')
            ->firstOrFail();

        return view('admin.bills.show', compact('bill'));
    }

    /*
     * Hiển thị 1 hóa đơn để sửa
     *
     * @param int $id
     *
     */
    public function showUpdate($id)
    {
        $bill_status = BillStatus::all();

        $bill = $this->bill_services->find($id);

        $this->authorize('update', $bill);

        return view('admin.bills.update', compact('bill', 'bill_status'));
    }

    public function update(Request $request, $bill_id)
    {
        // lấy hóa đơn theo id
        $bill = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
            ->join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'branch_id',
                DB::raw('group_concat(order_services.service_id) as service_id'))
            ->where('bills.id', $bill_id)
            ->groupBy(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'branch_id'
                )
            ->orderby('orders.id', 'desc')
            ->firstOrFail();

        $this->authorize('update', $bill);

        $bill_status_paid = config('contants.bill_status_paid');

        if ($request->bill_status_id == $bill_status_paid) {
            // lấy thông tin bill join lịch đặt
            $bill_order = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
            ->join('order_services', 'order_services.order_id', '=', 'orders.id')
            ->select(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'branch_id',
                DB::raw('group_concat(order_services.service_id) as service_id'))
            ->where('bills.id', $bill_id)
            ->groupBy(
                'total_price',
                'total_payment',
                'discount',
                'bill_status_id',
                'bills.note',
                'bills.created_at',
                'bills.updated_at',
                'bills.id',
                'full_name',
                'phone_number',
                'orders.time',
                'branch_id'
                )
            ->orderby('orders.id', 'desc')
            ->firstOrFail();

            // lấy số điện thoại trong lịch đặt
            $phone_number = $bill_order->phone_number;

            // lấy đối tượng tích điểm của khách theo số điện thoại trong lịch đặt
            $accumulate = $this->accumulate_points_services->getAccumulateWithPhoneNumber($phone_number);

            // nếu đã từng thanh toán và có tài khoản tích điểm rồi thì cộng thêm, chưa có thì thêm mới
            if ($accumulate != null) {
                // lấy giá trị tích điểm mới sau khi thanh toán
                $new_accumulate_of_guest = $bill->total_payment + $accumulate->total_money;
                // gán giá trị tích điểm mới
                $accumulate->total_money = $new_accumulate_of_guest;
            } else {
                $accumulate = new AccumulatePoints();
                // gán giá trị tích điểm mới
                $accumulate->phone_number = $phone_number;
                $accumulate->full_name = $bill_order->full_name;
                $accumulate->total_money = $bill->total_payment;
            }
            // cập nhật tích điểm mới
            $accumulate->save();
        }

        // cập nhật hóa đơn
        $bill->fill($request->all())->save();

        return redirect()->route('bills.index')->with('toast_success', 'Cập nhật thành công');
    }
}
