<?php

namespace App\Http\Controllers\Dashboard;

use App\Services\BranchServices;
use App\Services\FeedbackServices;
use App\Services\OrderServices;
use App\Services\ServiceServices;
use App\Services\TypeServiceServices;
use App\Services\UserServices;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $branch_services;
    protected $user_services;
    protected $service_services;
    protected $order_services;
    protected $feedback_services;
    protected $type_services;

    public function __construct(
        BranchServices $branch_services,
        UserServices $user_services,
        ServiceServices $service_services,
        OrderServices $order_services,
        FeedbackServices $feedback_services,
        TypeServiceServices $type_services
    ) {
        $this->branch_services = $branch_services;
        $this->user_services = $user_services;
        $this->service_services = $service_services;
        $this->order_services = $order_services;
        $this->feedback_services = $feedback_services;
        $this->type_services = $type_services;
    }

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
        return view('admin.index', compact(
                'branch',
                'user',
                'service',
                'order',
                'feedback',
                'type_services',
                'count_order',
                'count_order_completed'
            )
        );
    }
}
