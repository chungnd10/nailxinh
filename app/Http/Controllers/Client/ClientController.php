<?php

namespace App\Http\Controllers\Client;

use App\Services\BranchServices;
use App\Services\FeedbackServices;
use App\Services\GenderServices;
use App\Services\OperationStatusServices;
use App\Services\OrderServices;
use App\Services\RoleServices;
use App\Services\ServiceServices;
use App\Services\SlideServices;
use App\Services\TypeServiceServices;
use App\Services\UserServices;
use App\Services\UserServiceServices;
use App\Http\Controllers\Controller;
use App\Services\WebSettingServices;

class ClientController extends Controller
{
    protected $user_services;
    protected $branch_services;
    protected $gender_services;
    protected $role_services;
    protected $operation_status_services;
    protected $service_services;
    protected $type_services;
    protected $user_services_services;
    protected $websetting_services;
    protected $order_services;
    protected $feedback_services;
    protected $slide_services;

    public function __construct(
        OrderServices $order_services,
        UserServices $user_services,
        BranchServices $branch_services,
        GenderServices $gender_services,
        RoleServices $role_services,
        OperationStatusServices $operation_status_services,
        ServiceServices $service_services,
        TypeServiceServices $type_services,
        UserServiceServices $user_services_services,
        WebSettingServices $websetting_services,
        FeedbackServices $feedback_services,
        SlideServices $slide_services
    ) {
        $this->slide_services = $slide_services;
        $this->feedback_services = $feedback_services;
        $this->order_services = $order_services;
        $this->user_services = $user_services;
        $this->branch_services = $branch_services;
        $this->gender_services = $gender_services;
        $this->role_services = $role_services;
        $this->operation_status_services = $operation_status_services;
        $this->service_services = $service_services;
        $this->type_services = $type_services;
        $this->user_services_services = $user_services_services;
        $this->websetting_services = $websetting_services;
    }

    public function index()
    {
        $info = $this->websetting_services->all();
        $type_services = $this->type_services->all();
        $branch = $this->branch_services->count();
        $user = $this->user_services->count();
        $service = $this->service_services->count();
        $orders = $this->order_services->count();
        $feedbacks = $this->feedback_services->all();
        $slides = $this->slide_services->allDisplay();

        return view('client.index', compact('info',
                'type_services',
                'branch',
                'user',
                'service',
                'orders',
                'feedbacks',
                'slides'
            )
        );
    }

    public function introduction()
    {
        return view('client.introduction');
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function services()
    {
        return view('client.services');
    }

    public function typeServices($id)
    {

    }

    public function booking()
    {
        return view('client.booking');
    }

    public function gallery()
    {
        return view('client.gallery');
    }
}
