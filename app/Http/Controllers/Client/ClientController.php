<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Order;
use App\Service;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $display_status_id = config('contants.display_status_display');

        $branch = $this->branch_services->count();
        $user = $this->user_services->count();
        $service = $this->service_services->count();
        $orders = $this->order_services->count();
        $feedbacks = $this->feedback_services->allWithDisplayStatus($display_status_id);
        $slides = $this->slide_services->allDisplay();
        $technicians = $this->user_services->getTechnician();
        $index_active = true;

        return view('client.index', compact(
                'branch',
                'user',
                'service',
                'orders',
                'feedbacks',
                'slides',
                'technicians',
                'index_active'
            )
        );
    }

    public function introduction()
    {
        $introduction_active = true;

        return view('client.introduction', compact('introduction_active'));
    }

    public function contact()
    {
        $contact_active = true;

        $cities = $this->city_services->all();

        return view('client.contact', compact('contact_active', 'cities'));
    }

    public function typeServices($id)
    {
        $display_status_id = config('contants.display_status_display');
        $feedbacks = $this->feedback_services->allWithDisplayStatus($display_status_id);
        return view('client.services', compact('feedbacks', 'services_active'));
    }

    public function services()
    {
        $services_active = true;

        $display_status_id = config('contants.display_status_display');
        $feedbacks = $this->feedback_services->allWithDisplayStatus($display_status_id);

        return view('client.services', compact('feedbacks', 'services_active'));
    }

    public function servicesDetail($id)
    {
        $service = $this->service_services->find($id);
        return view('client.service-detail', compact('service'));
    }

    public function booking()
    {
        $booking_active = true;
        $branchs = $this->branch_services->all();
        $type_services = $this->type_services->all();
        $users = $this->user_services->getTechnician();

        return view('client.booking', compact('branchs', 'type_services', 'users', 'booking_active'));
    }

    public function bookingTest()
    {
        $booking_active = true;
        $branchs = $this->branch_services->all();
        $type_services = $this->type_services->all();
        $users = $this->user_services->getTechnician();

        return view('client.booking-test', compact('branchs', 'type_services', 'users', 'booking_active'));
    }


    public function bookingTestStore(Request $request)
    {
        $order = new Order();

        $order->order_status_id = config('contants.order_status_unconfimred');
        $order->full_name = $request->sir.' '.$request->full_name;
        $order->service_id = implode(',',$request->service_id);
        $order->order_status_id = config('contants.order_status_unconfimred');

        $order->fill($request->all())->save();

        $notification = notification('success', 'Đặt lịch thành công, chúng tôi sẽ liên hệ để xác nhận với bạn trong thời gian sớm nhất');
        return redirect(route('index'))->with($notification);

    }

    public function gallery()
    {
        $gallery_active = true;

        return view('client.gallery', compact('gallery_active'));
    }
}
