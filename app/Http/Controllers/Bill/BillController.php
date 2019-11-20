<?php

namespace App\Http\Controllers\Bill;

use App\AccumulatePoints;
use App\Bill;
use App\BillStatus;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
            ->select('bills.id',
                    'total_price',
                    'total_payment',
                    'discount',
                    'bills.note',
                    'order_id',
                    'bill_status_id',
                    'full_name',
                    'phone_number',
                    'time',
                    'branch_id',
                    'user_id',
                    'service_id',
                    'order_status_id'
            )
            ->get();

        return view('admin.bills.index', compact('bills'));
    }

    // xem chi tiết 1 hóa đơn
    public function show($order_id)
    {
        $order_id = head(Hashids::decode($order_id));

        $bill = Order::join('bills', 'orders.id', '=', 'bills.order_id')
            ->where('orders.id', $order_id)
            ->get();

        $bill = $bill->first();

        return view('admin.bills.show', compact('bill'));
    }

    // hiển thị 1 hóa đơn để sửa
    public function showUpdate($id)
    {
        $id = head(Hashids::decode($id));
        $bill_status = BillStatus::all();
        $bill = Bill::find($id);

        return view('admin.bills.update', compact('bill', 'bill_status'));
    }

    public function update(Request $request, $bill_id)
    {
        // giải mã id
        $bill_id = head(Hashids::decode($bill_id));

        // lấy hóa đơn theo id
        $bill = $this->bill_services->find($bill_id);

        // lấy thông tin bill join lịch đặt
        $bill_order = $this->bill_services->getBilJoinOrderWithBillId($bill_id);

        // lấy số điện thoại trong lịch đặt
        $phone_number = $bill_order->phone_number;

        // lấy đối tượng tích điểm của khách theo số điện thoại trong lịch đặt
        $accumulate = $this->accumulate_points_services->getAccumulateWithPhoneNumber($phone_number);

        // nếu đã từng thanh toán và có tài khoản tích điểm rồi thì cộng thêm, chưa có thì thêm mới
        if ($accumulate != null){
            // lấy giá trị tích điểm mới sau khi thanh toán
            $new_accumulate_of_guest = $bill->total_payment + $accumulate->total_money;

            // gán giá trị tích điểm mới
            $accumulate->total_money = $new_accumulate_of_guest;
        }else{
            $accumulate = new AccumulatePoints();
            // gán giá trị tích điểm mới
            $accumulate->phone_number = $phone_number;
            $accumulate->total_money = $bill->total_payment;
        }

        // cập nhật tích điểm mới
        $accumulate->save();

        // cập nhật hóa đơn
        $bill->fill($request->all())->save();

        // thông báo
        $notifcation = notification('success', 'Cập nhật thành công');

        return redirect()->route('bills.index')->with($notifcation);
    }
}
