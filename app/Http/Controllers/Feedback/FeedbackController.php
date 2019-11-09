<?php

namespace App\Http\Controllers\Feedback;

use App\Feedback;
use App\Http\Requests\AddFeebackRequest;
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
        $feedbacks = $this->feedback_services->all();

        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('admin.feedbacks.create');
    }

    public function store(AddFeebackRequest $request)
    {
        $feedback = new Feedback();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/feedbacks', $name);
            $feedback->image = $name;
        }

        $feedback->display_status_id = config('contants.display_status_hide');
        $feedback->fill($request->all())->save();

        $notification = array(
            'message' => 'Thêm phản hồi thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('feedbacks.index')->with($notification);
    }

    public function show($id)
    {
        $feedback = $this->feedback_services->find($id);

        return view('admin.feedbacks.show', compact('feedback'));
    }

    public function update(AddFeebackRequest $request,  $id)
    {
        $feedback = $this->feedback_services->find($id);

        if ($request->hasFile('image')) {
            if (file_exists('upload/images/feedbacks/'.$feedback->image)
                && $feedback->image != 'feedback-default.png') {
                unlink('upload/images/feedbacks/'.$feedback->image);
            }
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/feedbacks', $name);
            $feedback->image = $name;
        }

        $feedback->fill($request->all())->save();

        $notification = array(
            'message' => 'Sửa phản hồi thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('feedbacks.index')->with($notification);

    }

    public function destroy($id)
    {
        $feedback = $this->feedback_services->find($id);

        if (file_exists('upload/images/feedbacks/'.$feedback->image)
            && $feedback->image != 'feedback-default.png') {
            unlink('upload/images/feedbacks/'.$feedback->image);
        }

        $feedback->delete();

        $notify = array(
            'message' => 'Xoá phản hồi thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('feedbacks.index')->with($notify);
    }

    public function changeStatus(Request $request)
    {
        $feedback = $this->feedback_services->find($request->id);

        $feedback->display_status_id = $request->display_status_id;

        $feedback->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

}
