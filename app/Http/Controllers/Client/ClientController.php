<?php

namespace App\Http\Controllers\Client;


use App\Introduction;
use App\Http\Controllers\Controller;
use App\Order;
use App\Service;
use App\Subscribe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $slides = $this->slide_services->allDisplay('asc');
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
        $introduction = Introduction::first();

        return view('client.introduction', compact('introduction_active', 'introduction'));
    }

    public function contact()
    {
        $contact_active = true;

        $cities = $this->city_services->all();

        return view('client.contact', compact('contact_active', 'cities'));
    }

    public function typeServices()
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

    public function servicesDetail($slug)
    {
        $service = $this->service_services->findBySlug($slug);
        if ($service == null){
            return view('client.errors.404');
        }
        $process = $this->process_of_services->getProcessWithType($service->id);

        return view('client.service-detail', compact('service', 'process'));
    }

    /*
     * Display page booking
     *
     */

    public function booking()
    {
        $booking_active = true;
        $branchs = $this->branch_services->all();
        $type_services = $this->type_services->all('asc');
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

    /*
     * Store booking
     *
     */
    public function bookingTestStore(Request $request)
    {
        $order = new Order();

        $order->order_status_id = config('contants.order_status_unconfirmed');
        $order->full_name = $request->sir . ' ' . $request->full_name;
        $order->service_id = implode(',', $request->service_id);
        $order->order_status_id = config('contants.order_status_unconfirmed');

        $order->fill($request->all())->save();

        $notification = notification('success',
            'Đặt lịch thành công, chúng tôi sẽ liên hệ để xác nhận với bạn trong thời gian sớm nhất');
        return redirect(route('index'))->with($notification);

    }

    /*
     * Display gallery
     *
     */
    public function gallery()
    {
        $gallery_active = true;

        return view('client.gallery', compact('gallery_active'));
    }

    /*
     * Register email
     *
     */
    public function subscribe(Request $request)
    {
        $subscribe = new Subscribe();

        $validator = Validator::make($request->all(),
            [
                'email' => 'required|max:300|unique:subscribes',
            ],
            [
                'email.required'    => '*Mục này không được để trống',
                'email.max'         => '*Không được vượt quá 300 ký tự',
                'email.unique'      => '*Email này đã được đăng ký trước đây',
            ]
        );

        if ($validator->fails()) {
            return redirect('/#error-email')->withErrors($validator)->withInput();
        }else {
            $subscribe->fill($request->all())->save();
            return redirect()->route('index')->with(
                'success',
                'Chúc mừng bạn đã đăng ký thành công !'
            );
        }
    }

    /*
     * Ajax get employees
     *
     */
    public function getEmployees(Request $request)
    {
        if ($request->ajax()){
            $branch_id = $request->branch_id;
            $service_id = $request->service_id;

            $users = User::join('user_services', 'user_services.user_id', '=','user.id')
                ->where('branch_id', $branch_id)
                ->where('service_id', $service_id)
                ->select('users.id', 'users.full_name', 'users.avatar')
                ->get();

            return response()->json($users);
        }
    }
}
