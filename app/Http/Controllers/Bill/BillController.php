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
        $bills = $this->bill_services->getAllBillJoinOrderJoinOrderServices('desc', 10);
        return view('admin.bills.index', compact('bills'));
    }

    // xem chi tiết 1 hóa đơn
    public function show($bill_id)
    {
        $bill = $this->bill_services->show($bill_id);
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
        $bill = $this->bill_services->show($bill_id);

        // chỉ được update hóa đơn chưa thanh toán
        $this->authorize('update', $bill);

        $bill_status_paid = config('contants.bill_status_paid');

        if ($request->bill_status_id == $bill_status_paid) {
            // lấy thông tin bill join lịch đặt
            $bill_order = $this->bill_services->show($bill_id);

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

        $bill->payment_by = \Auth::user()->id;
        $bill->fill($request->all())->save();

        return redirect()->route('bills.index')->with('toast_success', 'Cập nhật thành công');
    }

    /*
     * Tim kiem nang cao
     *
     */
    public function advancedSearch(Request $request){
        $phone_number = $request->phone_number;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $bills = $this->bill_services->advancedSearch($phone_number, $start_date, $end_date, 10);
        $request->flash();
        return view('admin.bills.index', compact('bills'));
    }
}
