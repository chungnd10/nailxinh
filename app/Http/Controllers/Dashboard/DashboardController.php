<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Subscribe;

class DashboardController extends Controller
{
    public function index()
    {
        $branch = $this->branch_services->count();
        $user = $this->user_services->count();
        $service = $this->service_services->count();
        $order = $this->order_services->count();
        $feedback = $this->feedback_services->count();
        $type_services = $this->type_services->count();
        $count_order = $this->order_services->countOrderWithMonths();
        $count_order_completed = $this->order_services->countOrderWithMonthsCompleted();
        $count_photo = $this->photo_library_services->count();
        $count_subscribe = Subscribe::count();
        return view('admin.index', compact(
                'branch',
                'user',
                'service',
                'order',
                'feedback',
                'type_services',
                'count_order',
                'count_order_completed',
                'count_photo',
                'count_subscribe'
            )
        );
    }
}
