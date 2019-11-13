<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $phone_number = $request->phone_number;
        $sir = $request->sir;
        $full_name = $request->full_name;
        $branch_id = $request->branch_id;
        $service_id = $request->service_id;
        $user_id = $request->user_id;
        $date = $request->date;
        $time = $request->time;
        $note = $request->note;

        dd($phone_number,
            $sir,
            $full_name,
            $branch_id,
            $service_id,
            $user_id,
            $date,
            $time,
            $note
        );
    }
}
