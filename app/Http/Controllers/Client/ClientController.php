<?php

namespace App\Http\Controllers\Client;


use App\Introduction;
use App\Http\Controllers\Controller;
use App\Order;
use App\Subscribe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /*
     * Show page index
     *
     */
    public function index()
    {
        $display_status_id = config('contants.display_status_display');

        $branch = $this->branch_services->count();
        $user = $this->user_services->count();
        $service = $this->service_services->count();
        $orders = $this->order_services->count();
        $feedbacks = $this->feedback_services->allWithDisplayStatus($display_status_id);
        $slides = $this->slide_services->allDisplay('asc');
        $technicians = $this->user_services->getTechnicianWithStatus($display_status_id);
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


    /*
     * Show page introduction
     *
     */
    public function introduction()
    {
        $introduction_active = true;
        $introduction = Introduction::first();
        $photo_gallery = $this->photo_library_services->random(8);

        return view('client.introduction', compact(
                'introduction_active',
                'introduction',
                'photo_gallery'
            )
        );
    }

    /*
     * Show page contact
     *
     */
    public function contact()
    {
        $contact_active = true;

        $cities = $this->city_services->all();

        return view('client.contact', compact('contact_active', 'cities'));
    }

    /*
     * Show page type service
     *
     */
    public function typeServices()
    {
        $display_status_id = config('contants.display_status_display');
        $feedbacks = $this->feedback_services->allWithDisplayStatus($display_status_id);
        return view('client.services', compact('feedbacks', 'services_active'));
    }

    /*
     * Show page services
     *
     */
    public function services()
    {
        $services_active = true;

        $display_status_id = config('contants.display_status_display');
        $feedbacks = $this->feedback_services->allWithDisplayStatus($display_status_id);

        return view('client.services', compact('feedbacks', 'services_active'));
    }

    /*
     * Show page services detail
     *
     */
    public function servicesDetail($slug)
    {
        $service = $this->service_services->findBySlug($slug);
        if ($service == null) {
            return view('client.errors.404');
        }
        $process = $this->process_of_services->getProcessWithType($service->id);
        $orther_services = $this->service_services->getOrtherServices($service->id, $service->type_of_services_id);

        return view('client.service-detail', compact('service', 'process', 'orther_services'));
    }

    /*
     * Display page booking
     *
     */

    public function booking()
    {
        $booking_active = true;
        $branchs = $this->branch_services->all('asc');
        $type_services = $this->type_services->all('asc');

        return view('client.booking', compact('branchs', 'type_services', 'booking_active'));
    }

    /*
     * Lưu lịch đặt của người dùng
     *
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            $validator = Validator::make($request->all(),
                [
                    'phone_number'  => 'required',
                    'full_name'     => 'required',
                    'branch_id'     => 'required',
                    'service_id'    => 'required',
                    'user_id'       => 'required',
                    'date'          => 'required',
                    'hours'         => 'required',
                    'note'          => 'nullable|max:300'
                ],
                [
                    'phone_number.required'  => '*Mục này không được để trống',
                    'full_name.required'     => '*Mục này không được để trống',
                    'branch_id.required'     => '*Mục này không được để trống',
                    'service_id.required'    => '*Mục này không được để trống',
                    'user_id.required'       => '*Mục này không được để trống',
                    'date.required'          => '*Mục này không được để trống',
                    'hours.required'         => '*Mục này không được để trống',
                    'note.max'               => '*Mục này không được để trống'
                ]
            );

            if ($validator->fails()) {
                return response()->json(
                    [
                        'errors'=>[
                            'phone_number' => $validator->errors()->first('phone_number'),
                            'full_name' => $validator->errors()->first('full_name'),
                            'branch_id' => $validator->errors()->first('branch_id'),
                            'service_id' => $validator->errors()->first('service_id'),
                            'user_id' => $validator->errors()->first('user_id'),
                            'time' => $validator->errors()->first('time'),
                            'note' => $validator->errors()->first('note'),
                        ]
                    ]
                );
            }
            $time = $request->date .' '. $request->hours;
            $check_exists_order = $this->order_services->checkExsitsOrder($request->user_id, $time);
            if ($check_exists_order > 0){
                return response()->json(['error' => 'Lich dat da ton tai !']);
            }
            $order = new Order();
            $order->phone_number = $request->phone_number;
            $order->full_name = $request->full_name;
            $order->branch_id = $request->branch_id;
            $order->user_id = $request->user_id;
            $order->time = $time;
            $order->note = $request->note;
            $order->order_status_id = config('contants.order_status_unconfirmed');
            $order->save();
            $services_id[] = $request->service_id;
            $order->services()->sync($services_id, $order->id);
           
            return response()->json(['success'=>'Store Successfully']);
        }
        return response()->json(['fail' => 'Store fail']);
    }

     /*
     * Kiem tra xem co phai danh sach hạn che khong
     *
     */
    public function checkLimitedList(Request $request)
    {
        if ($request->ajax()) {
            $phone_number = $request->phone_number;
            $limited_phone_number = $this->restricted_lists->checkLimitedList($phone_number);
            return $limited_phone_number;
        }
        return response()->json(['fail' => 'check fail.']);
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
                'email' => 'required|max:300|unique:subscribes|email',
            ],
            [
                'email.required'    => '*Vui lòng nhập email !',
                'email.max'         => '*Không được vượt quá 300 ký tự !',
                'email.unique'      => '*Email này đã được đăng ký trước đây !',
                'email.email'       => '*Email không đúng định dạng !'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        }
        $subscribe->fill($request->all())->save();
        return response()->json(['success' => 'subscribes successfully !']);
    }


    /*
     * Ajax get employees
     *
     */
    public function getEmployees(Request $request)
    {
        if ($request->ajax()) {
            $branch_id = $request->branch_id;
            $service_id = $request->service_id;
            $status_inactive = config('contants.operation_status_inactive');

            $users = User::join('user_services', 'user_services.user_id', '=','users.id')
                ->where('branch_id', $branch_id)
                ->where('service_id', $service_id)
                ->where('operation_status_id','<>', $status_inactive)
                ->select('users.id', 'users.full_name', 'users.avatar')
                ->get();

            return response()->json($users);
        }
    }

    /*
     * Check limit order
     * @param string  date y-m-d
     * @param int     phone_number
     */
    public function checkLimitOrder(Request $request)
    {
        if ($request->ajax()) {
            $phone_number = $request->phone_number;
            $date = $request->date;

            $orders = Order::where('phone_number', $phone_number)
                ->whereDate('time', $date)
                ->count();

            return response()->json($orders);
        }
        return response('fail', 201);
    }

    /*
     * check Time User
     *
     */
    public function checkTimeUser(Request $request)
    {
        $times = [
            "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00",
            "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30", "19:00"
        ];
        if ($request->ajax()) {
            $user_id = $request->user_id;
            $date = $request->date;

            foreach ($times as $key => $item) {
                $datetime = $date . ' ' . $item;
                $date_time[] = date('Y-m-d H:i', strtotime($datetime));
            }

            $result = Order::where('user_id', $user_id)
                ->whereIn('time', $date_time)
                ->select('time')
                ->orderBy('time', 'asc')
                ->get();
            $time_was_used =[]; 
            foreach ($result as $item) {
                $time_was_used[] = $item->time;
            }
            return response()->json($time_was_used);
        }
        return response('fail', 201);
    }

}
