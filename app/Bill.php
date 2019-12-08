<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Bill
 *
 * @property int $id
 * @property float $total_price
 * @property float $total_payment
 * @property int $discount
 * @property string|null $note
 * @property int $order_id
 * @property int $bill_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\BillStatus $billStatus
 * @property-read \App\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereBillStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereTotalPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill firstOrFail($value)
 * @mixin \Eloquent
 */
class Bill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bills';

    protected $fillable = [
      'note',
      'time',
      'bill_status_id'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function billStatus()
    {
        return $this->belongsTo(BillStatus::class);
    }

    // lay ten 1 user
    public function getNameUser($user_id)
    {
        $user = User::where('id', $user_id)->select('full_name')->get();

        return $user->first()->full_name;
    }

    // lấy danh sách dịch vụ cho hóa đơn
    public function getServices($services_id)
    {
        $services_id = explode(',', $services_id);
        $services = Service::whereIn('id', $services_id)->get();

        return $services;

    }


}
