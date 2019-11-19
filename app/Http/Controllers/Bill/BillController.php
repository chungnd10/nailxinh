<?php

namespace App\Http\Controllers\Bill;

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
        $bills = Bill::join('orders', 'orders.id', '=', 'bills.order_id' )->get();

        return view('admin.bills.index', compact('bills'));
    }

    public function show($order_id)
    {
        $order_id = head(Hashids::decode($order_id));

        $bill = Order::join('bills', 'orders.id', '=', 'bills.order_id' )
            ->where('orders.id', $order_id)
            ->get();

        $bill = $bill->first();

        return view('admin.bills.show', compact('bill'));
    }

    public function showUpdate($id)
    {
        $id = head(Hashids::decode($id));
        $bill_status = BillStatus::all();
        $bill = Bill::find($id);

        return view('admin.bills.update', compact('bill', 'bill_status'));
    }

    public function update(Request $request, $id)
    {
        $id = head(Hashids::decode($id));
        $bill = Bill::find($id);
        $bill->fill($request->all())->save();

        $notifcation = notification('success', 'Cập nhật thành công');
        return redirect()->route('bills.index')->with($notifcation);
    }
}
