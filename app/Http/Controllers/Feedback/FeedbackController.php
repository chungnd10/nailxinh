<?php

namespace App\Http\Controllers\Feedback;

use App\Feedback;
use App\Services\FeedbackServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    protected $feedback_services;

    public function __construct(FeedbackServices $feedback_services)
    {
        $this->feedback_services = $feedback_services;
    }

    public function index()
    {
        $feedbacks = $this->feedback_services->all(100);
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();

        $notify = array(
            'message' => 'Xoá phản hồi thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('feedbacks.index')->with($notify);
    }

    public function changeStatus(Request $request)
    {
        $feedback = Feedback::find($request->id);
        $feedback->display_status_id = $request->display_status_id;
        $feedback->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

}
