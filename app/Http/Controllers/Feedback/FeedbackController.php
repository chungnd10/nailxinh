<?php

namespace App\Http\Controllers\Feedback;

use App\Feedback;
use App\Http\Requests\AddFeebackRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FeedbackController extends Controller
{
    /*
     * Show page index
     *
     */
    public function index()
    {
        $admin = config('contants.role_admin');
        $technician = config('contants.role_technician');

        if (Auth::check()) {
            $role_id = Auth::user()->role_id;
            $user_id = Auth::user()->id;

            switch ($role_id) {
                case $admin :
                    $feedbacks = $this->feedback_services->all();
                    break;
                case $technician :
                    $feedbacks = $this->feedback_services->allWithUser($user_id);
                    break;
            }
        }

        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    /*
     * Show page create
     *
     */
    public function create()
    {
        return view('admin.feedbacks.create');
    }

    /*
     * Store new feedback
     *
     */
    public function store(AddFeebackRequest $request)
    {
        $feedback = new Feedback();
        $feedback->display_status_id = config('contants.display_status_hide');
        $path = config('contants.upload_feedbacks_path');

        if ($request->avatar_hidden != null) {
            $image = $request->avatar_hidden;
            $image = handleImageBase64($image);
            $imageName = getNameImageUnique(12);
            File::put($path.$imageName, $image);
            $feedback->image = $imageName;
        }
        $feedback->user_id = Auth::user()->id;
        $feedback->fill($request->all())->save();

        return redirect()->route('feedbacks.index')->with('toast_success', 'Thêm thành công !');
    }

    /*
     * Show feedback for editting
     *
     */
    public function show($id)
    {
        $feedback = $this->feedback_services->find($id);
        return view('admin.feedbacks.show', compact('feedback'));
    }

    /*
     * Update feedback
     *
     */
    public function update(AddFeebackRequest $request,  $id)
    {
        $feedback = $this->feedback_services->find($id);
        $path = config('contants.upload_feedbacks_path');

        if ($request->avatar_hidden != null) {
            $image = $request->avatar_hidden;
            $image = handleImageBase64($image);
            $imageName = getNameImageUnique(12);
            File::put($path.$imageName, $image);
            $feedback->image = $imageName;
        }

        $feedback->user_id = Auth::user()->id;
        $feedback->fill($request->all())->save();

        return redirect()->route('feedbacks.index')->with('toast_success', 'Cập nhật thành công !');

    }

    /*
     * Destroy feedback
     *
     */
    public function destroy($id)
    {
        $feedback = $this->feedback_services->find($id);
        $path = config('contants.upload_feedbacks_path');
        $img_default = config('contants.img_user_default');

        checkExistsAndDeleteImage($path, $feedback->image, $img_default);
        $feedback->delete();

        return redirect()->route('feedbacks.index')->with('toast_success', 'Xoá thành công !');
    }

    /*
     * Change status feedback
     *
     */
    public function changeStatus(Request $request)
    {
        $this->authorize('edit-feedbacks');
        $feedback = $this->feedback_services->find($request->id);

        $feedback->display_status_id = $request->display_status_id;
        $feedback->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

}
