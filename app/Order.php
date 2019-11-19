<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

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
        'user_id',
        'order_status_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
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

}
