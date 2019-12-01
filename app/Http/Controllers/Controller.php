<?php

namespace App\Http\Controllers;

use App\Services\BillServices;
use App\Services\OrderStatusServices;
use App\Services\PhotoLibraryServices;
use App\Services\UserTypeServiceServices;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Services\BranchServices;
use App\Services\CityServices;
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
use App\Services\WebSettingServices;
use App\Services\RestrictedListServices;
use App\Services\ProcessOfServiceServices;
use App\Services\AccumulatePointServices;
use App\Services\MembershipTypeServices;
use App\Services\IntroductionServices;
use App\Services\DisplayStatusServices;
use Vinkla\Hashids\Facades\Hashids;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user_services;
    protected $branch_services;
    protected $gender_services;
    protected $role_services;
    protected $operation_status_services;
    protected $service_services;
    protected $type_services;
    protected $user_services_services;
    protected $web_setting_services;
    protected $order_services;
    protected $feedback_services;
    protected $slide_services;
    protected $city_services;
    protected $restricted_lists;
    protected $process_of_services;
    protected $accumulate_points_services;
    protected $membership_type;
    protected $introduction_services;
    protected $display_status_services;
    protected $user_type_service_services;
    protected $order_status_services;
    protected $bill_services;
    protected $photo_library_services;
    protected $hashids;

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
        WebSettingServices $web_setting_services,
        FeedbackServices $feedback_services,
        SlideServices $slide_services,
        CityServices $city_services,
        RestrictedListServices $restricted_lists,
        ProcessOfServiceServices $process_of_services,
        AccumulatePointServices $accumulate_points_services,
        MembershipTypeServices $membership_type,
        IntroductionServices $introduction_services,
        DisplayStatusServices $display_status_services,
        UserTypeServiceServices $user_type_service_services,
        OrderStatusServices $order_status_services,
        BillServices $bill_services,
        PhotoLibraryServices $photo_library_services
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
        $this->web_setting_services = $web_setting_services;
        $this->city_services = $city_services;
        $this->restricted_lists = $restricted_lists;
        $this->process_of_services = $process_of_services;
        $this->accumulate_points_services = $accumulate_points_services;
        $this->membership_type = $membership_type;
        $this->introduction_services = $introduction_services;
        $this->display_status_services = $display_status_services;
        $this->user_type_service_services = $user_type_service_services;
        $this->order_status_services = $order_status_services;
        $this->bill_services = $bill_services;
        $this->photo_library_services = $photo_library_services;
        $this->hashids = new Hashids();

    }

}
