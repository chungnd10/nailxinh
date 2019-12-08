<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * App\Order
 *
 * @property int $id
 * @property string $full_name
 * @property string $phone_number
 * @property string $time
 * @property string|null $note
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int $branch_id
 * @property int|null $user_id
 * @property string $service_id
 * @property int $order_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Bill $bill
 * @property-read \App\Branch $branch
 * @property-read \App\OrderStatus $orderStatus
 * @property-read \App\Service $service
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    protected $fillable = [
        'full_name',
        'phone_number',
        'time',
        'note',
        'branch_id',
        'order_status_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'order_services');
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }

    // lấy nhiều tên dịch vụ theo mảng id
    public function getNameServices($services_id)
    {
        $services_id = explode(',', $services_id);

        $services = Service::whereIn('id', $services_id)->get();

        $services = $services->pluck('name');
        return implode(', ', $services->toArray());

    }

    // lấy danh sách dịch vụ cho hóa đơn
    public function getServices($services_id)
    {
        $services_id = explode(',', $services_id);
        $services = Service::whereIn('id', $services_id)->get();

        return $services;

    }

    //kiểm tra xem lịch đã được thanh toán chưa
    public function checkPaid($order_id)
    {
        $order_join_bill = Bill::join('orders', 'orders.id', '=', 'bills.order_id')
            ->select('bill_status_id')
            ->where('orders.id', $order_id)
            ->first();

        if ($order_join_bill->bill_status_id == config('contants.bill_status_paid')) {
            return true;
        } else {
            return false;
        }
    }


}
